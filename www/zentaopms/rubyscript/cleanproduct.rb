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


class ZProduct < MysqlBase
	self.inheritance_column = "xtype"
	self.table_name = 'zt_product'
end

class ZProjectProduct < MysqlBase
	self.table_name = 'zt_projectproduct'
end

product_names = []

ZProduct.all.each do |p|
  if product_names.include?(p.name)
  	ZProjectProduct.where(:product=>p.id).delete_all
  	p.delete
  else
  	product_names << p.name
  end
end







#sudo install_name_tool -change libmysqlclient.16.dylib /usr/local/mysql/lib/libmysqlclient.16.dylib /Users/hailor/.rvm/gems/ruby-2.0.0-p247/gems/mysql2-0.3.15/lib/mysql2/mysql2.bundle
