# encoding: utf-8
require "rubygems"
require "active_record"
require "mysql2"

class PhabBase < ActiveRecord::Base  
	self.table_name = 'maniphest_task'
end

PhabBase.establish_connection(
  adapter:  "mysql2",
  host:     "127.0.0.1",
  port: 3308,
  username: "root",
  password: "",
  database: "phabricator_maniphest"
)

class PhabTask < PhabBase
	self.table_name = 'maniphest_task'
end


class PhabTransaction < PhabBase
	self.table_name = 'maniphest_transaction'
end

class PhabTransactionComment < PhabBase
	self.table_name = 'maniphest_transaction_comment'
end

class PhabModule < PhabBase
	self.table_name = 'maniphest_customfieldstorage'
end


class PhabUserBase < ActiveRecord::Base  
	self.table_name = 'user'
end


PhabUserBase.establish_connection(
  adapter:  "mysql2",
  host:     "127.0.0.1",
  port: 3308,
  username: "root",
  password: "",
  database: "phabricator_user"
)

class PhabUser < PhabUserBase
	self.table_name = 'user'
end





class ZentaoBase < ActiveRecord::Base  
	self.table_name = 'zt_task'
end

ZentaoBase.establish_connection(
  adapter:  "mysql2",
  host:     "127.0.0.1",
  port: 3307,
  username: "zentao",
  password: "handhand",
  database: "zentao"
)



class Task < ZentaoBase
	self.table_name = 'zt_task'
	self.inheritance_column = "not_sti"
end

class Action < ZentaoBase
	self.table_name = 'zt_action'
end

class Product < ZentaoBase
	self.table_name = 'zt_product'
end

class Project < ZentaoBase
	self.table_name = 'zt_project'
end

import_project_id = 1
import_product_id =",3,"
status_map = {"open"=>"wait","waitfortest"=>"doing","inprocess"=>"doing","resolved"=>"done","invalid"=>"cancel","hang"=>"pause","discuss"=>"pause","duplicate"=>"cancel"}

module_map = {"hand:accout"=>4,"hand:purchase"=>2,"hand:stock"=>3,"hand:theme"=>6,"hand:base"=>1}


def process_content(content)
	return content.gsub("\n","<br/>")
end

origin_task = Task.find(1)

PhabTask.all.each do |d|
    author = PhabUser.where(:phid=>d.authorPHID).first
    owner = PhabUser.where(:phid=>d.ownerPHID).first
    print "#{d.status} "
    print "T#{d.id} "
	print d.title
	print "\n"
	moduleValue = PhabModule.where(:objectPHID=>d.phid,:fieldIndex=>"mmtVxlRDPPVw").first.fieldValue if PhabModule.where(:objectPHID=>d.phid,:fieldIndex=>"mmtVxlRDPPVw").first
	moduleS = module_map[moduleValue]||1
	task = Task.create(:project=>import_project_id,:module=>moduleS,:story=>0,:storyVersion=>1,:fromBug=>0,:name=>"T#{d.id} #{d.title}","type"=>"devel",:pri=>0,:estimate=>0,:consumed=>0,:left=>0,:deadline=>origin_task.deadline,:status=>status_map[d.status],:mailto=>"",:desc=>process_content(d.description),:openedBy=>author.userName,:openedDate=>Time.at(d.dateCreated),:assignedTo=>(owner ? owner.userName : 0 ),:assignedDate=>Time.at(d.dateCreated),:estStarted=>origin_task.estStarted,:realStarted=>origin_task.realStarted,:finishedBy=>"",:finishedDate=>origin_task.finishedDate,:canceledBy=>"",:canceledDate=>origin_task.canceledDate,:closedBy=>"",:closedDate=>origin_task.closedDate,:closedReason=>"",:lastEditedBy=>(owner ? owner.userName : ""),:lastEditedDate=>Time.at(d.dateModified),:deleted=>0)
	
	trans = PhabTransaction.where(:objectPHID=>d.phid)
	trans.each do |tr|
		PhabTransactionComment.where(:transactionPHID=>tr.phid).each do |tc|
		actor = PhabUser.where(:phid=>d.authorPHID).first
			Action.create(:objectType=>"task",:objectID=>task.id,:product=>import_product_id,:project=>import_project_id,:actor=>(actor ? actor.userName : 0 ),:action=>"commented",:date=>Time.at(tc.dateCreated),:comment=>process_content(tc.content),:extra=>"",:read=>0)
		end
	end
	
	
end


# update zt_task set deadline="0000-00-00" where deadline IS NULL;
# update zt_task set estStarted="0000-00-00" where estStarted IS NULL;
# update zt_task set realStarted="0000-00-00" where realStarted IS NULL;
# update zt_task set finishedDate="0000-00-00" where finishedDate IS NULL;
# update zt_task set canceledDate="0000-00-00" where canceledDate IS NULL;
# update zt_task set closedDate="0000-00-00" where closedDate IS NULL;

#
#
#def process_employee(source_dept,target_dept)
#	OEmployee.where(:unit_id=>source_dept.unit_id).each do |e|
#		if User.exists?(:account=> e.employee_code)
#			if e.cur_state != -1
#			    User.where(:account=> e.employee_code).first.update_attributes(:gender=>{1=>"f",0=>"m"}[e.sex_id],:dept=>#target_dept.id)
#			    UserGroup.create(:account=>e.employee_code,:group=>12) unless  UserGroup.exists?(:account=>e.employee_code)
#			else
#				User.where(:account=> e.employee_code).first.delete
#				next
#			end 
#		else
#			next if e.cur_state == -1
#			user = User.create(:account=>e.employee_code,
#				:dept=>target_dept.id,
#				:password=>"187cca46ab69a66cdff777315459c07c",
#				:role=>"ohters",
#				:gender=>{1=>"f",0=>"m"}[e.sex_id],
#				:realname=>e.name,
#				:email=>e.email||"",
#				:commiter=>"")
#			UserGroup.create(:account=>user.account,:group=>12)
#	    	print user.errors
#		end
#	end
#end
#
#def process_dept(source,parent,grade,path,order)
#	
#	target_dept = Department.where(:grade=>grade+1,:name=>source.unit_name,:parent=>parent).first
#	unless target_dept.present?
#		target_dept = Department.create(:grade=>grade+1,:name=>source.unit_name,:order=>order,:parent=>parent)
#		print target_dept.id
#		target_dept.update_attribute(:path,"#{path}#{target_dept.id},")
#		print "\n"
#	end
#	process_employee(source,target_dept)
#	order = 10
#	ODepartment.where(:parent_id=>source.unit_id).each do |d|   
#		process_dept(d,target_dept.id,grade+1,"#{path}#{target_dept.id},",order)
#		order = order+5
#	end
#	#ODepartment.where(:parent_id=>source.unit_id)
#end
#
#
#
#
#order = 10
#ODepartment.where(:parent_id=>"1000").each do |d|
#    
#	process_dept(d,0,0,",",order)
#	order = order+5
#end
#
#
#
#
##sudo install_name_tool -change libmysqlclient.16.dylib /usr/local/mysql/lib/libmysqlclient.16.dylib /Users/hailor/.rvm/gems/#ruby-2.0.0-p247/gems/mysql2-0.3.15/lib/mysql2/mysql2.bundle
#