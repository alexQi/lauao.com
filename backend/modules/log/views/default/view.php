<div class="row">
    <div class="col-xs-12">
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item no-border">
                <b>原始路由：</b>
                <i>
                    <code><?php echo $logModel['module'] . '/' . $logModel['controller'] . '/' . $logModel['action'] ?></code>
                </i>
            </li>
            <li class="list-group-item no-border">
                <b>被记录人：</b> <a class="link-black"><code><?php echo $logModel['userExtend']['real_name']?$logModel['userExtend']['real_name'] :'未知'; ?></code></a>
            </li>
            <li class="list-group-item no-border">
                <b>操作时间：</b> <a class="link-black"><code><?php echo date('Y-m-d H:i:s', $logModel['created_at']) ?></code></a>
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php if (empty($thList)): ?>
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <td class="text-center">未查找到有效数据</td>
                </tr>
            </table>
        <?php else: ?>
            <?php if ($oldDataList): ?>
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <td colspan="<?php echo count($thList) ?>" class="bg-gray">
                            <kbd>原始数据记录</kbd> <i class="glyphicon glyphicon-arrow-right"></i> 数据表名称：<code><?php echo $logModel['table_name'] ?></code>
                            ，主键：<code><?php echo $logModel['primary_key'] ?></code>
                        </td>
                    </tr>
                    <tr>
                        <?php foreach ($thList as $th): ?>
                            <th><?php echo $th; ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <?php foreach ($oldDataList as $td): ?>
                            <td><?php echo $td!=='' && $td!==null ?$td:'<code>NULL</code>'; ?></td>
                        <?php endforeach; ?>
                    </tr>
                </table>
            <?php endif; ?>
            <?php if ($newDataList): ?>
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <td colspan="<?php echo count($thList) ?>" class="bg-gray">
                            <kbd>变更数据记录</kbd> <i class="glyphicon glyphicon-arrow-right"></i>
                            数据表名称：<code><?php echo $logModel['table_name'] ?></code>，主键：<code><?php echo $logModel['primary_key'] ?></code>
                        </td>
                    </tr>
                    <tr>
                        <?php foreach ($thList as $th): ?>
                            <th><?php echo $th; ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <?php foreach ($newDataList as $td): ?>
                            <td><?php echo $td!=='' && $td!==null ?$td:'<code>NULL</code>'; ?></td>
                        <?php endforeach; ?>
                    </tr>
                </table>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>