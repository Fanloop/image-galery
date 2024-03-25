// import "./bootstrap";
import { initFlowbite } from "flowbite";

document.addEventListener("livewire:navigated", () => {
    console.log("livewire navigate");
    initFlowbite();
});
