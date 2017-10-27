<div class="row">
    <div class="col-md-6">    
        <div class="box box-primary box-update">   
            <div class="box-header with-border">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <h3 class="box-title">登録フォーム</h3>
            </div>
            <div class="box-body">                
                <?php
                echo $this->SimpleForm->render($updateForm);
                ?>
            </div>
        </div>
    </div>
</div>