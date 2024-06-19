'use strict';
let currentPage = 1;
let rowsPerPage = 5;



// function to filterTable by parameters provided
function filterTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const table = document.querySelector('.table-container table');
    const tr = table.getElementsByTagName('tr');
    
    for (let i = 1; i < tr.length; i++) {
      let tds = tr[i].getElementsByTagName('td');
      let rowContainsFilterText = false;

      for (let j = 0; j < tds.length; j++) {
        if (tds[j]) {
          let textValue = tds[j].textContent || tds[j].innerText;
          if (textValue.toLowerCase().indexOf(filter) > -1) {
            rowContainsFilterText = true;
            break;
          }
        }
      }
      if (rowContainsFilterText) {
        tr[i].style.display = '';
      } else {
        tr[i].style.display = 'none';
      }
    }
    // paginateTable();
  }

// funtion for pagination
function changeRowsPerPage() {
    rowsPerPage = parseInt(document.getElementById('rowsPerPage').value);
    paginateTable();
  }

  function paginateTable() {
    const table = document.querySelector('.table-container table');
    const tr = table.getElementsByTagName('tr');
    let start = (currentPage - 1) * rowsPerPage + 1;
    let end = start + rowsPerPage;
    
    for (let i = 1; i < tr.length; i++) {
      if (i >= start && i < end) {
        tr[i].style.display = '';
      } else {
        tr[i].style.display = 'none';
      }
    }
    document.getElementById('prevButton').disabled = currentPage === 1;
    document.getElementById('nextButton').disabled = end >= tr.length;
  }

  function nextPage() {
    currentPage++;
    paginateTable();
  }

  function prevPage() {
    currentPage--;
    paginateTable();
  }

  // Initial call to setup the pagination
  paginateTable();