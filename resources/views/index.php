<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title><?= $project->name; ?> - 统计结果</title>
    <link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div>
    <h1 class="text-center"><?= $project->name; ?></h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>成员名称<br/>（字母顺序）</th>
            <th>预计总工时<br/>（小时）</th>
            <th>实际总工时<br/>（小时）</th>
            <th>工时正偏差<br/>（小时）</th>
            <th>工时负偏差<br/>（小时）</th>
            <th>工期正偏差<br/>（天）</th>
            <th>工期负偏差<br/>（天）</th>
            <th>未解决<br/> Bug 总数</th>
            <th>已解决个人<br/> Bug 总数</th>
            <th>已解决一二级<br/> Bug 数</th>
            <th>已解决反复激活<br/> Bug 数</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $user => $record): ?>
            <tr>
                <td>
                    <a href="<?= url('/deviations/' . $project->id . '/' . $record['user']); ?>"><strong><?= $record['user']; ?></strong></a>
                </td>
                <td><?= $record['estimate_sum']; ?></td>
                <td><?= $record['consumed_sum']; ?></td>
                <td><?= abs($record['hour_plus_deviation']); ?></td>
                <td><?= abs($record['hour_minus_deviation']); ?></td>
                <td><?= abs($record['day_plus_deviation']); ?></td>
                <td><?= abs($record['day_minus_deviation']); ?></td>
                <td><?= $record['activated_bug_total']; ?></td>
                <td><?= $record['all_bug_total']; ?></td>
                <td><?= $record['severe_bug_total']; ?></td>
                <td>
                    <a href="<?= url('/reactivated/' . $project->id . '/' . $record['user']); ?>"><strong><?= $record['reactivated_bug_total']; ?></strong></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>