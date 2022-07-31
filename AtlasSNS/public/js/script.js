$(function () {
  $('#Modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var post = button.data('whatever');
    var id = button.data('post-id');

    var modal = $(this);
    modal.find('.modal-body textarea#post').val(post);
    modal.find('.modal-body input#id').val(id);
  });
});
