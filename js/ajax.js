jQuery(function($){

function get_posts($params) {
  $content   = $('#ajaxPosts');
  $.ajax({
    url: psc.ajax_url,
    data: {
        action: 'filter_posts',
      nonce: psc.nonce,
      params: $params
      },
    type: 'post',
    dataType: 'json',
  success: function(data, textStatus, XMLHttpRequest) {
      if (data.status === 200) {
        $content.html(data.content);
      }
      else if (data.status === 201) {
        $content.html(data.message);  
      }
      else {
        $status.html(data.message);
      }
    },
    error: function(MLHttpRequest, textStatus, errorThrown) {
    $status.html(textStatus);
         }
  });
}

//Bind parameters to the button click
$(document).on('click', 'a[data-filter], .pagination a', function(event) {
if(event.preventDefault) { event.preventDefault(); }
  $this = $(this);
    if ($this.data('filter')) {
      //Set the active class on selected filter
      $this.closest('ul').find('.active').removeClass('active');
      $this.parent('li').addClass('active');
      $page = $this.data('page');
      $term = $this.data('term');
      $qty = $this.closest('#ajaxFilter').data('paged')
    } else {
      //Set active class for pagination
      $page = parseInt($this.attr('href').replace(/\D/g,''));
      $this = $('.nav-filter .active a');
      //window.scrollTo(0, '278px');
    }
    
        $params = {
          //Bind parameters
          'page' : $page,
          'tax'  : $this.data('filter'),
          'term' : $this.data('term'),
          'qty'  : $this.closest('#ajaxFilter').data('paged'),
        };
          //FOR TESTING---console.log($params['qty']);
        //Run the query with those parameters
        get_posts($params);
  });

//end of file
});