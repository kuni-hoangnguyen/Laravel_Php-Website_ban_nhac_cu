function confirmDelete(event, link) {
    event.preventDefault(); // Ngăn link hoạt động ngay

    Swal.fire({
        title: "Xác nhận xóa?",
        text: "Bạn có chắc chắn muốn xóa mục này? Hành động này không thể hoàn tác!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Xóa",
        cancelButtonText: "Hủy"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Đang xóa...",
                icon: "info",
                showConfirmButton: false,
                timer: 800
            });

            // Chờ một chút để hiển thị animation rồi chuyển trang
            setTimeout(() => {
                window.location.href = link.href;
            }, 800);
        }
    });
}
