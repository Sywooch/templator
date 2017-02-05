var editor;

function initFields()
{
    $('.ckeditor4').each(function () { CKEDITOR.replace(this, 
        {
            filebrowserImageUploadUrl: '/index.php?r=sites/uploadfile&site_id='+$('#site__id').val(),
            removeButtons: 'Subscript,Superscript,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe',
            removePlugins: 'elementspath',
            extraPlugins: 'pastefromword'
         // filebrowserImageBrowseUrl: '/index.php?r=sites/browsefiles&site_id='+$('#site__id').val(),
         // selectMultiple: true
        }); 
    });
    $('.sites__tpl_field').after(function () { return '<span class="sites__add_button" data-tpl="'+$(this).attr('id').replace(/tpl/, '')+'"><span class="glyphicon glyphicon-plus"></span> Добавить</span>'; });
    $('.sites__add_button').on('click', function ()
    {
        id = $(this).attr('data-tpl');
        
        val = $('#'+id).val();
        if(val.length)
            val += "\n";
            
        text = $('#tpl'+id).val();
        r = text.match(/\{\{.*?\}\}/g);
        for(k in r)
        {
            q = r[k].replace(/(^\{\{|\}\}$)/g, '');
            q = q.split(',');
            
            text = text.replace(r[k], q[Math.floor(Math.random() * q.length)]);
        }
        
        $('#'+id).val(val + text);
    });
}

$().ready(function () {


    $('#sites__template').on('change', function ()
    {
        if(!$(this).val().length)
            { return false; }

       // tinymce.remove(".tinymce");
    
        $.get('/index.php?r=sites/getfields&t_id='+$(this).val(), function (data)
        {
            $('#sites__field_list').html(data);
            
            initFields();
        });
        
        $.get('/index.php?r=sites/gettpl&t_id='+$(this).val(), function (data)
        {
            $('#sites__tpl_description').html(data);
        });
    });
    
    if(typeof CKEDITOR != 'undefined')
    {
        initFields(); 
    }
});
