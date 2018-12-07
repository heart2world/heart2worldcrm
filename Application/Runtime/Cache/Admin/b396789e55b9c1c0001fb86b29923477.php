<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>客户管理系统</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="/Public/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="/Public/css/ionicons.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="/Public/css/select2.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/Public/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="/Public/css/_all-skins.min.css">

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <style>
        .info_style{width: 30%;}
        .logs_content{margin-left: 25px;}
        .logs_line{line-height: 30px;}
        table{border: 1px solid #000;width: 80%;}
        th,td{border:  1px solid #000;text-align: center;line-height: 30px;padding: 0 5px;}
    </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">


    <div class="wrapper">
        <!--菜单-->
        <!--上部-->
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo U('Index/index');?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>宇</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>重庆心联宇</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/Public/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo ($user['name']); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="/Public/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                            <p>
                                <?php echo ($user['name']); ?>
                                <small><?php echo ($user['role_text']); ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat popshow" url="<?php echo U('Users/update_password',array('id'=>$vo['id'],'name'=>$user['name']));?>" title="重置密码" w="600" h="400">修改密码</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo U('Public/logout');?>" class="btn btn-default btn-flat">退出</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--左部-->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/Public/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info" style="line-height: 45px;">
                <p><?php echo ($user['name']); ?></p>
                <!--<a href="#"><i class="fa fa-circle text-success"></i> 在线</a>-->
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
            </div>
        </form>
        <!-- /.search form -->
        <!--菜单管理-->
        <ul class="sidebar-menu" data-widget="tree">
            <?php if(is_array($menu_data)): $i = 0; $__LIST__ = $menu_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li <?php if(($vo['is_show']) == "1"): ?>class="treeview active"<?php else: ?>class="treeview"<?php endif; ?> >
                <a href="#">
                    <?php switch($vo['type']): case "1": ?><i class="fa fa-files-o"></i><?php break;?>
                        <?php case "2": ?><i class="fa fa-gear"></i><?php break;?>
                        <?php case "3": ?><i class="fa fa-user"></i><?php break;?>
                        <?php default: ?><i class="fa fa-files-o"></i><?php endswitch;?>
                    <span><?php echo ($vo['title']); ?></span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <?php if(is_array($vo['level_data'])): $i = 0; $__LIST__ = $vo['level_data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li <?php if(($item['is_show']) == "1"): ?>class="active"<?php endif; ?> ><a href="<?php echo ($item['url']); ?>"><i class="fa fa-circle-o"></i><?php echo ($item['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

        <!--内容页面-->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--<h1>-->
                    <!---->
                    <!--<small>Control panel</small>-->
                <!--</h1>-->
                <b><?php echo ($info['name']); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                负责人：<?php echo ($info['person_id']); ?>&nbsp;&nbsp;&nbsp;&nbsp;
                下次跟进时间：<?php echo ($info['next_follow_time']); ?>&nbsp;&nbsp;&nbsp;&nbsp;

                <a class="btn btn-primary btn-sm popshow" url="<?php echo U('customer_transfer',array('customer_id'=>$info['id']));?>" title="转移客户" w="600" h="400">转移</a>
                <a class="btn btn-primary btn-sm popshow" url="<?php echo U('edit',array('id'=>$info['id']));?>" title="编辑客户" w="600" h="500">编辑</a>
                <a class="btn btn-primary btn-sm popshow" url="<?php echo U('add_follow',array('customer_id'=>$info['id']));?>" title="写跟进" w="600" h="500">写跟进</a>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <section class="col-lg-6 connectedSortable">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs pull-right">
                                <li class="pull-left header">基本信息</li>
                            </ul>
                            <div class="tab-content no-padding">
                                <div class="chart tab-pane active" style="position: relative; min-height: 600px;">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="info_style">手机号</label>
                                            <span><?php echo ($info['mobile']); ?></span>
                                        </div>
                                        <?php if(is_array($info['fields_data'])): $i = 0; $__LIST__ = $info['fields_data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="form-group">
                                                <label class="info_style"><?php echo ($vo['title']); ?></label>
                                                <?php if($vo['other_type'] == 'image'): ?><span>
                                                        <?php if(is_array($vo['content'])): $i = 0; $__LIST__ = $vo['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><img style="width: 100px;height: 100px;" src="<?php echo ($item); ?>" /><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </span>
                                                    <?php else: ?>
                                                    <span><?php echo ($vo['content']); ?></span><?php endif; ?>
                                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php if(!empty($info['file_data'])): ?><div class="form-group">
                                            <label class="info_style">附件</label>
                                            <div>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>上传时间</th>
                                                            <th>附件名称</th>
                                                            <th>操作</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if(is_array($info['file_data'])): $i = 0; $__LIST__ = $info['file_data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                                            <td><?php echo ($vo['create_time']); ?></td>
                                                            <td><?php echo ($vo['name']); ?></td>
                                                            <td><a href="<?php echo ($vo['url']); ?>">下载</a></td>
                                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="col-lg-6 connectedSortable">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs pull-right">
                                <li class="pull-left header">跟进动态</li>
                            </ul>
                            <div class="tab-content no-padding">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" style="position: relative; min-height: 600px;">
                                    <div class="box-body">
                                        <?php if(is_array($logs)): $i = 0; $__LIST__ = $logs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="form-group">
                                            <label><i class="fa fa-fw fa-circle" style="margin-right: 5px;"></i><?php echo ($vo['create_time']); ?></label>
                                            <div class="logs_content">
                                                <?php switch($vo['type']): case "1": ?><div class="logs_line"><?php echo ($vo['content']['follow_user']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo['content']['follow_type']); ?></div>
                                                        <div class="logs_line"><?php echo ($vo['content']['content']); ?></div>
                                                        <?php if(!empty($vo['content']['follow_pic'])): ?><div class="logs_line">
                                                                <?php if(is_array($vo['content']['follow_pic'])): $i = 0; $__LIST__ = $vo['content']['follow_pic'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><img style="width: 100px;height: 100px;" src="<?php echo getFileUrl($item);?>" /><?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </div><?php endif; ?>
                                                        <div class="logs_line">写跟进的时间：<?php echo ($vo['content']['follow_time']); ?></div><?php break;?>
                                                    <?php case "2": ?><div class="logs_line">编辑客户</div>
                                                        <?php if(is_array($vo['content'])): $i = 0; $__LIST__ = $vo['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="logs_line"><?php echo ($item['title']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($item['content']); ?></div><?php endforeach; endif; else: echo "" ;endif; break;?>
                                                    <?php default: ?><div class="logs_line"><?php echo ($vo['content']); ?></div><?php endswitch;?>
                                            </div>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </section>

        </div>

        <!--尾部-->
        <footer class="main-footer">
	<div class="pull-right hidden-xs">
		<!--<b>Version</b> 1.0.0-->
	</div>
	<strong>Copyright &copy; 2016-2018 <a href="#">重庆心联宇</a> </strong> 版权所有
</footer>
    </div>


<!-- jQuery 3 -->
<script src="/Public/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/Public/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/Public/js/adminlte.min.js"></script>

<script src="/Public/layer/layer.js"></script>
<script src="/Public/js/common.js?r=<?php echo NOW_TIME;?>"></script>



</body>
</html>