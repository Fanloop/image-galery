import "./bootstrap";
// import "./dropdown";
// import "./moreText";
import { initFlowbite } from "flowbite";

document.addEventListener("livewire:navigated", () => {
    initFlowbite();
});
