(function($) {
  'use strict';
  $(function() {
    $('#order-listing').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "Todos"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });

    $('#order-listing').each(function() {
      var datatable = $(this);
      // console.log('contenido de datatable',datatable);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Buscar');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
})(jQuery);



(function($) {
  'use strict';
  $(function() {
    $('#order-listing2').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "Todos"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });

    $('#order-listing2').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Buscar');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
})(jQuery);




(function($) {
  'use strict';
  $(function() {
    $('#order-listing3').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "Todos"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });

    $('#order-listing3').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Buscar');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
})(jQuery);




(function($) {
  'use strict';
  $(function() {
    $('#order-listing4').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "Todos"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });

    $('#order-listing4').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Buscar');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
})(jQuery);

