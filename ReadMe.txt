使用此系统前必须要阅读以下内容！
一、需知
	1.因为是管理系统，所以就没有必要把界面做成别特酷炫
	2.销售人员===库存管理员（一人身兼数职）
	3.登录系统的账号、密码全部都是在数据库中注册生成，不能自行注册
	4.此系统目前有多个管理者账号，并且存在（user表中）
二、功能介绍
	1.仪表盘
		显示订单总数、库存种类、流水等信息
	2.订单管理
		1）.销售
			①.未处理订单：
				1）需要在数据库中手动输入生成数据
				2）数据：订单号（10位）、名称（必须一定是在库存中有的烟草，不能瞎生成）、烟草编号（与库存里面id对应）、单价、总价、订货人、订货地址、联系方式、备注
				3）操作：
					①点击查看详情：显示弹出层，订单详情
					②点击去处理：{
						1）点取消
						2）点确定 弹出订单处理成功时候有三个数据库操作{
							1.库存数量减少/
							2.当前未处理订单减少/
							3.已处理订单增加/
						}
					}


			②.已处理订单
		2）.退货（要进行退货的订单）：需要在数据库中手动输入生成
		3）.查询（9中查询方式）
