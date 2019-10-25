import "./hum.js";
import flatpickr from "flatpickr"; // formで使用するカレンダーアドオン
import "../scss/contact.scss";

flatpickr(".days", {
  enableTime: true,
  minDate: "today", // 今日以前を選択不可
  dateFormat: "Y-m-d H:i"
});
