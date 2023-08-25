const LendBooks = {
    init() {

        this._initialListener();
    },

    _initialListener() {
        
        this._lendOnInput();
    },

    _lendOnInput() {
        const el = document.querySelector('.finish-lend');
        if (el) {
            el.addEventListener('click', () => {
                const id = $('.finish-lend').attr('id');
                this.sendData(id);
            });
        }
    },

    sendData(id){
        console.log(id);
        $.ajax({
            url: '/admin/finish-lend',
            type: "POST",
            headers: headers,
            data: {
                id : id,
            },
            success: function (data) {
                data = JSON.parse(JSON.stringify(data));
                
                alert("Sukses");
                
                // swalOption = {
                //     title: "Buku Telah Dikembalikan!",
                //     icon: "success",
                //     button: "Oke!",
                // };

                // swal(swalOption);
                // $('.swal-button').click(function() {
                //     location.reload();
                // });

            },
            error: function (data, textStatus, errorThrown) {
                data = JSON.parse(JSON.stringify(data));
                alert("gagal");
                // console.log(data.err_message);
            },
        });
    }
};

export default LendBooks;
