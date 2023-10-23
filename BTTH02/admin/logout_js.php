<script>
    window.addEventListener('beforeunload', function(event) {
        // Kiểm tra nếu event.clientY có giá trị, người dùng đang thực hiện thao tác tắt tab
        if (event.clientY < 0) {
            // Gửi yêu cầu đến máy chủ để huỷ phiên làm việc
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../logout.php', true);
            xhr.send();
        }
    });
</script>