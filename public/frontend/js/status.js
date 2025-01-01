document.addEventListener("DOMContentLoaded", function () {
	const status_qty = document.querySelectorAll("label[data-quantity]");
	const status_order = document.querySelectorAll("span[data-status]");

	status_qty.forEach((badge) => {
		const quantity = parseInt(badge.getAttribute("data-quantity"), 10);

		if (quantity > 10) {
			badge.textContent = "Còn hàng";
			badge.className = "badge badge-success";
		} else if (quantity > 0) {
			badge.textContent = "Sắp hết hàng";
			badge.className = "badge badge-warning";
		} else {
			badge.textContent = "Hết hàng";
			badge.className = "badge badge-danger";
		}
	}
	)

	status_order.forEach((status) => {
		const statusValue = status.getAttribute("data-status");

		switch (statusValue) {
			case "1":
				status.textContent = "Chờ xác nhận";
				status.classList.add("badge-warning");
				break;
			case "2":
				status.textContent = "Đang giao hàng";
				status.classList.add("badge-info");
				break;
			case "3":
				status.textContent = "Đã giao hàng";
				status.classList.add("badge-success");
				break;
			case "4":
				status.textContent = "Đã hủy";
				status.classList.add("badge-danger");
				break;
			default:
				break;
		}
	}
	)
});
