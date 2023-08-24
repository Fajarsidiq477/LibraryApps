const AdminEditBook = {
    init() {
        $('.btn').on('click', function(e) {
            if ($(this).hasClass('edit-data-book')) {
                sendData();
            }
        });
    },
};

function sendData(){
    let url = "/update-create-book";
    let url1 = "/admin/books/books.update";

    $.ajax({
        url: url,
        type: "POST",
        headers: headers,
        data: new FormData(document.getElementById("form-book-edit")),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            data = JSON.parse(JSON.stringify(data));
            console.log(data);
            // location.reload();
        },
        error: function (data, textStatus, errorThrown) {
            data = JSON.parse(JSON.stringify(data));
            alert(data.message);
            console.log(data.err_message);
        },
    });
}

export default AdminEditBook;
