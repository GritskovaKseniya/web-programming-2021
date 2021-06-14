$("#save").click(()=>{
    let id = $('#id').html();
    let name = $('#name').val();
    let description = $('#description').val();
    $.ajax({
        type: "POST",
        url: window.location.origin + window.location.pathname,
        data: {id, name, description},
        success: (html)=>{
            console.log(html);
            window.location.replace(window.location.origin + window.location.pathname);
        }
    });
    return false;
})