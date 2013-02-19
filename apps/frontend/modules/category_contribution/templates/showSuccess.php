<?php use_stylesheet('jobs.css') ?>
 
<?php slot('title', sprintf('Jobs in the %s category', $category_contribution->getName())) ?>
 
<div class="category">
  <div class="feed">
    <a href="">Feed</a>
  </div>
  <h1><?php echo $category_contribution ?></h1>
</div>
 
<?php include_partial('contribution/list', array('jobs' => $pager->getResults())) ?>
 
<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('category_contribution', $category_contribution) ?>?page=1">
      <img src="/legacy/images/first.png" alt="First page" title="First page" />
    </a>
 
    <a href="<?php echo url_for('category_contribution', $category_contribution) ?>?page=<?php echo $pager->getPreviousPage() ?>">
      <img src="/legacy/images/previous.png" alt="Previous page" title="Previous page" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('category_contribution', $category_contribution) ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('category_contribution', $category_contribution) ?>?page=<?php echo $pager->getNextPage() ?>">
      <img src="/legacy/images/next.png" alt="Next page" title="Next page" />
    </a>
 
    <a href="<?php echo url_for('category_contribution', $category_contribution) ?>?page=<?php echo $pager->getLastPage() ?>">
      <img src="/legacy/images/last.png" alt="Last page" title="Last page" />
    </a>
  </div>
<?php endif; ?>
 
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> jobs in this category
 
  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>