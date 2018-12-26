<div class="title">
  <h1>Your current tags</h1>
</div>
<div class="tagSection">
  <div id="tagviewer">

      <?php
          PrintTags();
       ?>

      <div id="addDiv">
        <button type="button" name="button" id="addTags"></button>
        <form id="addTagForm" action="../sql/sqaddtags.php" method="post">
          <input type="text" name="tagSearch" value="Add tags...">
        </form>
      </div>
  </div>
</div>
