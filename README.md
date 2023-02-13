Chương trình quản lý kho hàng container
- Chức năng thêm thông tin kiện hàng container
- Xuất danh sách các kiện hàng container
- Xuất danh sách và chi tiết của kiện hàng từng theo từng container
- Sửa và xoá kiện hàng container

Mô tả:
- Chương trình được viết bằng Laravel Framework
- Có sử dụng RabbitMQ và MySQL
- Sử dụng RabbitMQ Queue driver for Laravel

Thông tin thêm:
- Tên Database: container-package-management
- Chương trình cấu hình sử dụng RabbitMQ trên localhost
- Có thể dùng CloudAMQP thay thế (config lại trong file .env)
- Sử dụng RabbitMQ cho chức năng thêm và sửa kiện hàng container nên bắt buộc phải chạy lệnh: "php artisan queue:work" để thực hiện job có trong queue (nếu không sẽ chỉ tạo thông tin container)
