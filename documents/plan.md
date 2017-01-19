# 一期

--frontend--
安装yii advanced, 配置运行环境。 [ok 2016-12-10]
配置测试环境。 [ok 2016-12-10]
部署github。 [ok 2016-12-11]
通过migration创建order, source, payment表。 [ok 2016-12-11]
gii创建order curd界面。 [ok 2016-12-13]
添加order管理菜单项。 [ok 2016-12-13]
修改order curd界面使其符合实际需要。
    登录用户才能访问。 [ok 2016-12-13]
    created_at, update_at自动生成，并自动格式化输出。 [ok 2016-12-13]
    查询界面page_size自定义。 [ok 2016-12-13]
    user_id自动填充（仅新加的时候）。 [ok 2016-12-13]
    send_date采用jquery日期控件。 [ok 2016-12-13]
    create和update跳转到index页面。 [ok 2016-12-13]
    create跳转到第1页。 [ok 2016-12-13]
    update跳转时能够记录原来的url querystring。 [ok 2016-12-20]
    查询列表和详情界面user_id需换成user name(label and value)。 [ok 2016-12-21]
    查询列表和详情界面paymethod_id和source_id需换成对应关联表的name值(label and value)。 [ok 2016-12-21]
    编辑时候source_id和paymethod_id需下拉选择。 [ok 2016-12-21]
    查询界面默认按id倒排序。 [ok 2016-12-21]
    查询界面显示列和原系统相同。 [ok 2016-12-31]
    查询界面搜索选择框和原系统相同。
order image upload功能，添加order表image字段，操作其添加编辑功能。 [ok 2016-12-31]
    查询列表和详情界面需显示image原图以及缩略图 编辑也要吗? (yii2有自动生成缩略图类库或方法吗？) [ok 2017-01-01]
    错误处理，参考http://php.net/manual/en/features.file-upload.errors.php，上传和存储都有可能出错。
多语言切换功能，cookie自动记忆。 [ok 2017-01-07]
翻译所有词条。（长期）
订单打印功能，精确自动分页。 [ok 2017-01-19]
    checkboxes [ok 2017-01-09]
    popup url [ok 2017-01-09]
    popup page [ok 2017-01-19]
    print pagination [ok 2017-01-19]
    可以选择是否打印图片/留言
多语言词条翻译。
查询界面的排序箭头不直观，改成向上和向下的箭头。
按日期排的订单号。
\yii\jui\DatePicker日期控件怎么翻译呢？

# 二期

--backend--
paymethod curd
source curd
    删除payment和source需判断是否有绑定order存在，如有则不能删除。(要使用外键约束吗?)
用户管理
用户权限控制（管理员manager，业务员salesman，快递员deliver）
    manager可以做任何事
    salesman可以添加order，并编辑删除自己的order
    deliver可以查看order

# 三期

单元测试
功能测试