require "rubygems"
require "active_record"
require "mysql2"
require 'spreadsheet'


class MysqlBase < ActiveRecord::Base  
	self.table_name = 'zt_dept'
end

MysqlBase.establish_connection(
  adapter:  "mysql2",
  host:     "172.20.0.66",
  port: 3306,
  username: "zentao",
  password: "handhand",
  database: "zentao"
)

class Story < MysqlBase
	self.table_name = 'zt_story'
end

class StorySpec < MysqlBase
	self.table_name = 'zt_storyspec'
end

Spreadsheet.client_encoding = 'UTF-8'


book = Spreadsheet.open '/Users/hailor/Work/2016/rdc/zentaopms/rubyscript/hrp_story.xls'

sheet1 = book.worksheet 0

project_mapping = {"医院资源计划系统"=>1}
module_mapping = {"主数据"=>1,"采购模块"=>2,"库存模块"=>3,"财务模块"=>4,"HR模块"=>5,"基础功能"=>6,"成本"=>7,"资产"=>8,"费用报销"=>9}
version_mapping = {"1.0"=>1,"2.0"=>2}
ignore = true
sheet1.each do |row|
   if ignore 
   		ignore = false
   		next
   	end
   	next if Story.exists?(:title=>row[5])
   story = Story.create(:product=>project_mapping[row[0]],
   	:module=>module_mapping[row[1]],
   	:plan=>version_mapping[row[2]],
   	:source=>"po",:title=>row[5],
   	:openedBy=>200000,
   	:stage=>"developed",
   	:keywords=>"  ",
   	:estimate=>8,:mailto=>"",
   	:openedDate=>"2016-03-02 10:59:38",
   	:assignedTo=>"",
   	:assignedDate=>"",
   	:lastEditedBy=>20000,
   	:lastEditedDate=>Time.now,
   	:reviewedBy=>"",
   	:reviewedDate=>"",
   	:closedBy=>"",
   	:closedDate=>"",
   	:closedReason=>"",
   	:toBug=>0,
   	:childStories=>"",
   	:linkStories=>"",
   	:duplicateStory=>0)
   puts story.attributes
   storyspec  = StorySpec.create(:story=>story.id,:version=>1,:title=>story.title,:spec=>row[6],:verify=>"")
end



# update zt_story set openedBy=3398,lastEditedBy=3398, assignedDate="0000-00-00 00:00:00", reviewedDate="0000-00-00",closedDate="0000-00-00 00:00:00" where lastEditedBy=20000
assignedDate=""