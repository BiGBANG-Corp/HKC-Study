$.ajaxSetup({
    'headers': {
        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
    },
    'type':     'POST',
    'dataType': 'json',
    'cache':    false,
    'timeout':  5000
});