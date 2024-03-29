<?php 
if(!empty($items))
for($i=0;$i<count($items);$i++){
?>
<tr>
<td>
    <div class="d-flex align-items-center">
    <img src="assets/uploads/<?=$items[$i]['urlImage']?>" alt=""  style="width: 45px; height: 45px" class="rounded-circle"/>
    <p class="fw-bold mb-1 ms-3"><?=$items[$i]['title']?></p>
    </div>
</td>
<td>
    <p class="fw-normal mb-1">
    <?php 
    if(!empty($wikis[$i]))
    for($j=0;$j<count($wikis[$i]);$j++){
        echo "<span class='bg-dark text-white ps-1 px-1 pb-1 rounded-1'>#".$wikis[$i][$j]['nameT']."</span> ";
    }else echo "<span class='text-center fw-bold text-secondary'>No Tags</span>";
    ?>
    </p>
</td>
<td>
    <p class="fw-normal mb-1"><?=$items[$i]['nameC']?></p>
</td>
<td >
    <svg onclick="deletItems(<?=$items[$i]['wikiID']?>,'<?=$items[$i]['urlImage']?>')" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="cursor-pointer bi bi-trash3 ml-2" viewBox="0 0 16 16">
    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" data-bs-toggle="modal" data-bs-target="#updateItems<?=$items[$i]['wikiID']?>" width="25" height="25" fill="currentColor" class="cursor-pointer bi bi-pencil-square" viewBox="0 0 16 16">
    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
    </svg>
    <div class="modal fade" id="updateItems<?=$items[$i]['wikiID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h2>Add New Item</h2>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="<?=$_ENV['APP_URL']."/updateItems"?>">
                <input type="text" name="title" value="<?=$items[$i]['title']?>" class="form-control mt-3" placeholder="Item Name">

                <input type="text" name="content" value="<?=$items[$i]['content']?>" class="form-control mt-3" placeholder="Item Content">

                <select name="category" id="" class="form-control mt-3">
                    <option value="null" disabled selected>choose category</option>
                    <?php
                    foreach($categorys as $category) {
                    ?>
                    <option value="<?=$category['categoryID']?>" <?php if($category['categoryID']==$items[$i]['categoryID']) echo 'selected'; ?>><?=$category['nameC']?></option>
                    <?php
                    }
                    ?>
                </select>

                <div class="mt-3">
                    <span style="margin-left: 5px;">Choose Your Tags : </span><br><br>
                    <select class="form-control" id="multiple-select-clear-field" name="Tags[]" data-placeholder="Choose Your Tages" multiple>
                    <?php
                    foreach($tagsWikis as $tagWiki) {
                    ?>
                    <option value="<?=$tagWiki['tagID']?>" 
                    <?php
                        for($j=0;$j<count($wikis[$i]);$j++){
                        if($wikis[$i][$j]['tagID']==$tagWiki['tagID']) echo "selected"; 
                        }
                        
                    ?>><?=$tagWiki['nameT']?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                <input type="hidden" name='urlimage' value='<?=$items[$i]['urlImage']?>'>
                <input type="file" name='photo' class="form-control mt-3" accept=".jpg, .png, .jpeg">

                <div class="button mt-3 mb-3 d-flex gap-2 justify-content-end">
                    <button type="submit" name="idWiki" value="<?=$items[$i]['wikiID']?>" class="btn btn-outline-success">Add</button>
                    <button type="reset"  data-bs-dismiss="modal" class="btn btn-outline-dark">Close</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</td>
</tr>
<?php
}
else{
echo "<tr><td class='text-center fw-bold text-secondary p-5 h3' colspan='4'>No Items</td></tr>";
}
?>