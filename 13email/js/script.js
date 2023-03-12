$("a.delete").on("click", function(e) {
    e.preventDefault();

    if (confirm("Are you sure ?")) {
        var frm = $('<form>');
        frm.attr('method', 'post');
        frm.attr('action', $(this).attr('href'));
        frm.appendTo('body');
        frm.submit();
    }
});

$("#formArticle").validate({
    rules: {
        Title: {
            required: true
        },
        Content: {
            required: true
        },
        Published_at: {
            required: true
        }
    }
});

$("#formContact").validate({
    rules: {
        email: {
            required: true,
            email: true
        },
        subject: {
            required: true
        },
        message: {
            required: true
        }
    }
});