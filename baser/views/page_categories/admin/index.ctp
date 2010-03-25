<?php
/* SVN FILE: $Id$ */
/**
 * [管理画面] ページカテゴリ一覧
 *
 * PHP versions 4 and 5
 *
 * BaserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2010, Catchup, Inc.
 *								9-5 nagao 3-chome, fukuoka-shi
 *								fukuoka, Japan 814-0123
 *
 * @copyright		Copyright 2008 - 2010, Catchup, Inc.
 * @link			http://basercms.net BaserCMS Project
 * @package			baser.views
 * @since			Baser v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
?>
<h2><?php $baser->contentsTitle() ?>&nbsp;<?php echo $html->image('help.png',array('id'=>'helpAdmin','class'=>'slide-trigger','alt'=>'ヘルプ')) ?></h2>
<div class="help-box corner10 display-none" id="helpAdminBody">
	<h4>ユーザーヘルプ</h4>
	<p>ページカテゴリは、ページを分類分けする際に利用し、URLにおいても階層構造の表現が可能となります。<br />
	また、各カテゴリは子カテゴリを持つ事ができるようになっています。</p>
	<div class="example-box">
		<div class="head">（例）カテゴリ「company」に属する、ページ名「about」として作成したページを表示させる為のURL</div>
		<p>http://[BaserCMS設置URL]/company/about.html</p>
	</div>
</div>

<table cellpadding="0" cellspacing="0" class="admin-col-table-01" id="TablePageCategoryCategories">
<tr>
	<th>操作</th>
    <th>NO</th>
	<th>ページカテゴリ名</th>
	<th>ページカテゴリタイトル</th>
	<th>登録日</th>
	<th>更新日</th>
</tr>
<?php if(!empty($dbDatas)): ?>
<?php $count=0; ?>
<?php foreach($dbDatas as $dbData): ?>
	<?php if ($count%2 === 0): ?>
		<?php $class=' class="altrow"'; ?>
	<?php else: ?>
		<?php $class=''; ?>
	<?php endif; ?>
	<tr<?php echo $class; ?>>
		<td class="operation-button">
			<?php $baser->link('編集',array('action'=>'edit', $dbData['PageCategory']['id']),array('class'=>'btn-orange-s button-s'),null,false) ?>
			<?php $baser->link('削除', array('action'=>'delete', $dbData['PageCategory']['id']), array('class'=>'btn-gray-s button-s'), sprintf('%s を本当に削除してもいいですか？\n\nこのカテゴリに関連するページは、どのカテゴリにも関連しない状態として残ります。', $dbData['PageCategory']['name']),false); ?>
		</td>
        <td><?php echo $dbData['PageCategory']['no']; ?></td>
		<td><?php $baser->link($dbData['PageCategory']['name'],array('action'=>'edit', $dbData['PageCategory']['id'])); ?></td>
        <td><?php echo $dbData['PageCategory']['title']; ?></td>
		<td><?php echo $timeEx->format('y-m-d',$dbData['PageCategory']['created']); ?></td>
		<td><?php echo $timeEx->format('y-m-d',$dbData['PageCategory']['modified']); ?></td>
	</tr>
	<?php $count++; ?>
<?php endforeach; ?>
<?php else: ?>
    <tr><td colspan="8"><p class="no-data">データが見つかりませんでした。</p></td></tr>
<?php endif; ?>
</table>

<div class="align-center"><?php $baser->link('新規登録',array('action'=>'add'),array('class'=>'btn-red button')) ?></div>