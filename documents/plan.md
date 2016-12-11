# 一期

--frontend--
安装yii advanced, 配置运行环境。 [ok 2016-12-10]
配置测试环境。 [ok 2016-12-10]
部署github。 [ok 2016-12-11]
通过migration创建order, source, payment表。 [ok 2016-12-11]
gii创建order curd界面。
修改order curd界面使其符合实际需要。
添加order管理菜单项。
order image upload功能，添加order表image字段，操作其添加编辑功能。
多语言切换功能，cookie自动记忆。
订单打印功能，精确自动分页，采用弹窗二次确认，可以选择是否打印图片/留言。

# 二期

--backend--
paymethod curd
source curd
    删除payment和source需判断是否有绑定order存在，如有则不能删除。(要使用外键约束吗?)
用户管理
用户权限控制（管理员manager，业务员salesman，快递员deliver）
    manager可以做任何事
    salesman可以操作order
    deliver可以查看order

# 三期

单元测试
功能测试