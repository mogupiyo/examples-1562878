@if (Session::get('status') != '')
<!-- モーダルウィンドウを呼び出すボタン -->
<button id="modal-open" type="button" style="display: none;" class="btn btn-primary" data-toggle="modal" data-target="#myModal">クリックするとモーダルウィンドウが開きます。</button>

<!-- モーダルウィンドウの中身 -->
<div class="modal fade show" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{ Session::get('modal_title') }}</h4>
      </div>
      <div class="modal-body">{{ Session::get('modal_content') }}</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
       </div>
    </div>
  </div>
</div>
<script type="text/javascript">
setTimeout(function(){
    $("#modal-open").trigger('click');
}, 100);
</script>
@endif
