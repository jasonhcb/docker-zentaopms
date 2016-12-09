# encoding: utf-8
require "rubygems"
require "active_record"
require "mysql2"
require 'active_record/connection_adapters/oracle_enhanced_adapter'
require 'oci8'

Encoding.default_external = Encoding::UTF_8
Encoding.default_internal = Encoding::UTF_8
class MysqlBase < ActiveRecord::Base  
	self.table_name = 'zt_dept'
end

MysqlBase.establish_connection(
  adapter:  "mysql2",
  host:     "172.20.0.63",
  port: 3306,
  username: "zentao",
  password: "handhand",
  database: "zentao"
)

class GitlabBase < ActiveRecord::Base  
	self.table_name = 'users'
end

GitlabBase.establish_connection(
  adapter:  "mysql2",
  host:     "172.20.0.66",
  port: 3306,
  username: "zentao",
  password: "handhand",
  database: "gitlabhq_production"
)

class OracleBase < ActiveRecord::Base  
	self.table_name = 'dual'
end

OracleBase.establish_connection(
  adapter:  "oracle_enhanced",
  host:     "192.168.11.242",
  port: 1521,
  username: "rdcpms",
  password: "rdcpms312",
  database: "hrms"
)

class Department < MysqlBase
	self.table_name = 'zt_dept'
end


class User < MysqlBase
	self.table_name = 'zt_user'
end

class UserGroup < MysqlBase
	self.table_name = 'zt_usergroup'
end


class ODepartment < OracleBase
	self.table_name = 'HR_ORG_UNIT_API_V'
end

class OEmployee < OracleBase
	self.table_name = 'HR_LBR_EMPLOYEE_API_V'
end


def process_employee(source_dept,target_dept)
	OEmployee.where(:unit_id=>source_dept.unit_id).each do |e|
		add_gitlab_user(e) if e.cur_state != -1
		if User.exists?(:account=> e.employee_code)
			puts "更新人员信息:"+e.employee_code
			if e.cur_state != -1
			    User.where(:account=> e.employee_code).first.update_attributes(:realname=>e.name,:gender=>{1=>"f",0=>"m"}[e.sex_id],:dept=>target_dept.id)
			    UserGroup.create(:account=>e.employee_code,:group=>12) unless  UserGroup.exists?(:account=>e.employee_code,:group=>12)
			else
				User.where(:account=> e.employee_code).first.delete
				next
			end 
		else
			next if e.cur_state == -1
			puts "新增人员信息:"+e.employee_code
			user = User.create(:account=>e.employee_code,
				:dept=>target_dept.id,
				:password=>"187cca46ab69a66cdff777315459c07c",
				:role=>"ohters",
				:gender=>{1=>"f",0=>"m"}[e.sex_id],
				:realname=>e.name,
				:email=>e.email||"",
				:commiter=>"")
			UserGroup.create(:account=>user.account,:group=>12) unless  UserGroup.exists?(:account=>user.account)
	    	user.errors.each do |message|
	    		puts message
	    	end 
		end
	end
end

def process_dept(source,parent,grade,path,order)
	
	target_dept = Department.where(:grade=>grade+1,:name=>source.unit_name,:parent=>parent).first
	unless target_dept.present?
		target_dept = Department.create(:grade=>grade+1,:name=>source.unit_name,:order=>order,:parent=>parent)
		print target_dept.id
		target_dept.update_attribute(:path,"#{path}#{target_dept.id},")
		print "\n"
	end
	process_employee(source,target_dept)
	order = 10
	ODepartment.where(:parent_id=>source.unit_id).each do |d|   
		process_dept(d,target_dept.id,grade+1,"#{path}#{target_dept.id},",order)
		order = order+5
	end
	#ODepartment.where(:parent_id=>source.unit_id)
end


def syncdept()
	order = 10
	ODepartment.where(:parent_id=>"1000").each do |d|
		puts "处理部门:"+d.unit_name
		process_dept(d,0,0,",",order)
		order = order+5
	end
end





class HProject < OracleBase
	self.table_name = 'PRJ_PROJECT_API_V'
end

class HProjectMember < OracleBase
	self.table_name = 'PRJ_PROJECT_MEMBER_API_V'
end

class ZProduct < MysqlBase
	self.inheritance_column = "xtype"
	self.table_name = 'zt_product'
end

class ZProject < MysqlBase
	self.inheritance_column = "xtype"
	self.table_name = 'zt_project'
end
class ZProjectProduct < MysqlBase
	self.table_name = 'zt_projectproduct'
end

class ZTeam < MysqlBase
	self.table_name = 'zt_team'
end

class ZGroup < MysqlBase
	self.table_name = 'zt_group'
	cattr_accessor :hrms_group_mapping,:group_mapping,:tech_role_name
	
end
ZGroup.hrms_group_mapping={"项目经理"=>"汉得项目经理组"}
ZGroup.group_mapping = {}
ZGroup.tech_role_name =["技术顾问","技术经理","DBA","技术总监"]


ZGroup.all.each do |zg|
	ZGroup.group_mapping[zg.name] = zg.id
end

class HProjectBtgMember < OracleBase
	self.table_name = 'HANDHR.PRJ_BGT_MEMBERS_API_V'
end

class HProjectTimesheet < OracleBase
	self.table_name = 'HANDHR.PRJ_TIMESHEET_API_V'
end

class ZMandays < MysqlBase
	self.table_name = 'zt_mandays'
end





def sync_project()

	HProject.where("(PROJECT_TYPE_ID=1 OR PROJECT_TYPE_ID= 44) AND status=1 AND project_name NOT LIKE '%运维%'").each do |hp|
		hp_members = HProjectMember.where(:project_id=>hp.project_id).order("date_from")
		if hp_members.empty?
			hp_members = []
			hp_members << HProjectMember.new(:member_employee_code=>hp.pm_employee_code,:role_code=>"PM",:role_name=>"项目经理",:date_from=>hp.begin_date,:date_to=>hp.end_date) if hp.pm_employee_code
		end
		next if hp_members.empty?
		puts "处理项目:"+hp.project_name
		pm = hp_members.detect{|m| "PM".eql?(m.role_code)}
		pm ||= hp_members.first
		order = ZProduct.where(:deleted=>"0").order("zt_product.order desc").first.order+5
		product = ZProduct.where(:name=>hp.project_name).first
		product ||= ZProduct.create(:name=>hp.project_name,
			:code=>hp.project_code,
			:type=>"normal",
			:status=>"normal",
			:desc=>"",
			:PO=>pm.member_employee_code,
			:QD=>"",
			:RD=>"",
			:acl=>"private",
			:whitelist=>"",
			:createdBy=>pm.member_employee_code,
			:createdDate=>Time.now,
			:createdVersion=>"8.2.1",
			:order=>order)
	
		project = ZProject.where(:name=>hp.project_name).first
		project ||=ZProject.create(:catID=>0,
			:name=>hp.project_name,
			:code=>hp.project_code,
			:begin=>hp.begin_date,
			:end=>hp.end_date||Time.now,
			:days=>(((hp.end_date||Time.now)-hp.begin_date)/1.day).abs,
			:status=>"doing",
			:desc=>"",
			:openedBy=>pm.member_employee_code,
			:openedDate=>Time.now,
			:openedVersion=>"8.2.1",
			:closedBy=>"",
			:canceledBy=>"",
			:PO=>pm.member_employee_code,
			:PM=>pm.member_employee_code,
			:QD=>"",
			:RD=>"",
			:team=>"",
			:acl=>"private",
			:whitelist=>"",
			:order=>0,
			:deptid=>hp.unit_name
			)
		if project.deptid.nil?
			project.update_attribute(:deptid,hp.unit_name)
		end

		if project.code.nil?
			project.update_attribute(:code,"project_"+hp.project_id)
		end
		#project.update_attribute(:status,"suspended")
	
		ZProjectProduct.create(:project=>project.id,:product=>product.id,:branch=>0) unless ZProjectProduct.exists?(:project=>project.id,:product=>product.id)
	
	
		hp_members.each do |hpm|
	
			if !ZTeam.exists?(:project=>project.id,:account=>hpm.member_employee_code)
				ZTeam.create(:project=>project.id,:account=>hpm.member_employee_code,:role=>hpm.role_name,:join=>hpm.date_from,:days=>((hpm.date_to-hpm.date_from)/1.day).abs,:hours=>8 ) if hpm.date_to&&hpm.date_from
			end

			if ZGroup.hrms_group_mapping[hpm.role_name]&&ZGroup.group_mapping[ZGroup.hrms_group_mapping[hpm.role_name]]
				UserGroup.create(:account=>hpm.member_employee_code,:group=>ZGroup.group_mapping[ZGroup.hrms_group_mapping[hpm.role_name]]) unless UserGroup.exists?(:account=>hpm.member_employee_code,:group=>ZGroup.group_mapping[ZGroup.hrms_group_mapping[hpm.role_name]])
			end

			if ZGroup.tech_role_name.include?(hpm.role_name)
				change_project_permission(hpm.member_employee_code)
			end
			
			btg_member_sum = HProjectBtgMember.where(:project_id=>hp.project_id,:employee_id=>hpm.member_employee_id).sum(:quantity)
			unless btg_member_sum
				btg_member_sum = 0
			end
			timesheet_tt = HProjectTimesheet.where(:project_id=>hp.project_id,:resource_id=>hpm.member_employee_id,:external_charge=>1,:is_verified=>1).count()
			
			if !ZMandays.exists?(:project=>project.id,:account=>hpm.member_employee_code)
				ZMandays.create(:project=>project.id,:account=>hpm.member_employee_code,:plandays=>btg_member_sum,:actualdays=>timesheet_tt)
			else
				ZMandays.where(:project=>project.id,:account=>hpm.member_employee_code).first.update_attributes(:plandays=>btg_member_sum,:actualdays=>timesheet_tt)
			end
		end
	
	end

end




class GitlabUser < GitlabBase
	self.table_name = 'users'
end


class GitlabIdentity < GitlabBase
	self.table_name = 'identities'
end

def add_gitlab_user(oemployee)
	return {} unless  oemployee.email&&!GitlabUser.exists?(:username=>oemployee.employee_code)&&!GitlabUser.exists?(:email=>oemployee.email)
	user = GitlabUser.create(:email=>oemployee.email,
		:encrypted_password=>"$2a$10$.umOu2SJn/9Yhb/j3CC1XOskKLv0xhHitgmcLm22tmLrlY./moYOy",
		:name=>oemployee.name,:confirmed_at=>Time.now,:state=>"active",:projects_limit=>0,:username=>oemployee.employee_code,:notification_email=>oemployee.email)
	GitlabIdentity.create(:extern_uid=>oemployee.employee_code,:provider=>"cas3",:user_id=>user.id)
end

def change_project_permission(employee_coe,number=10)
	user = GitlabUser.where(:username=>employee_coe).first
	if user&&user.projects_limit==0
		user.update_attribute(:projects_limit,5)
	end
end

syncdept()

sync_project()






#sudo install_name_tool -change libmysqlclient.16.dylib /usr/local/mysql/lib/libmysqlclient.16.dylib /Users/hailor/.rvm/gems/ruby-2.0.0-p247/gems/mysql2-0.3.15/lib/mysql2/mysql2.bundle
