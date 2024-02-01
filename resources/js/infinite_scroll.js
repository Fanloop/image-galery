import "infinite-scroll/js/core";
let msnry = new Masonry(".grid", {
    // Masonry options...
    itemSelector: ".gap-4",
});

// init Infinite Scroll
let infScroll = new InfiniteScroll(".grid", {
    // Infinite Scroll options...
    append: ".grid__item",
    outlayer: msnry,
});
