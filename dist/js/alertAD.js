function confirmdelete() {
    // Add a click event listener to all delete buttons
    document.querySelectorAll('button[name="deluser"]').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "คุณต้องการลบข้อมูลนี้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ลบเลย!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send AJAX request to delete the record
                    fetch('../process/deluser.php', {
                        method: 'POST',
                        body: new URLSearchParams('deluser=' + button.value)
                    })
                    .then(response => response.text())
                    .then(data => {
                        Swal.fire(
                            'ลบแล้ว!',
                            'ลบข้อมูลเรียบร้อยแล้ว.',
                            'success'
                        );
                        // Remove the row from the table
                        button.closest('tr').remove();
                    });
                }
            });
        });
    });
}