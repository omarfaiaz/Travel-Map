const listItems = document.querySelectorAll(".location");

const titles = [];
stores.features.forEach((store, i) => {
  titles[i] = store.properties.name;
});


function custom_search() {
  const searchVal = document.querySelector("#search_box").value.toLowerCase();
  listItems.forEach((listItem) => {
    listItem.style.display = "none";
  });
  titles.forEach((title, i) => {
    if (title.toLowerCase().includes(searchVal)) {
      listItems[i].style.display = "block";
    }
    
  });
}
