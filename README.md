Laravel实用工具包

添加服务提供者'Hello\FullstackvallleyServiceProvider::class'到config\app.php的服务提供者;
添加'FullstackValley'=>Hello\Facades\Fullstackvalley::classFacade到config\app.php的'aliases';

测试包是否导入成功请GET请求‘http://您的域名/fullstackvalley/test’

模型生成API:'http://您的域名/fullstackvalley/models/generate?name=表名'
