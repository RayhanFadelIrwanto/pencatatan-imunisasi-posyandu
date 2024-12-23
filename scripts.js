// Select the form and table elements
const form = document.getElementById("imunisasiForm");
const tableBody = document.querySelector("#imunisasiTable tbody");

// Handle form submission
form.addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent page reload

  // Get form data
  const namaAnak = document.getElementById("namaAnak").value;
  const usia = document.getElementById("usia").value;
  const jenisImunisasi = document.querySelector(
    'input[name="jenisImunisasi"]:checked'
  );
  const statusImunisasi = document.getElementById("statusImunisasi").checked
    ? "Sudah"
    : "Belum";

  // Validate data
  if (!namaAnak || !usia || !jenisImunisasi) {
    alert("Harap isi semua kolom formulir!");
    return;
  }

  // Add data to table
  const newRow = document.createElement("tr");
  newRow.innerHTML = `
        <td>${namaAnak}</td>
        <td>${usia}</td>
        <td>${jenisImunisasi.value}</td>
        <td>${statusImunisasi}</td>
    `;
  tableBody.appendChild(newRow);

  // Reset the form
  form.reset();
});

// Example function to fetch data from the server
async function fetchData() {
  try {
    const response = await fetch("backend/fetchData.php");
    const data = await response.json();

    // Populate the table with fetched data
    data.forEach((item) => {
      const newRow = document.createElement("tr");
      newRow.innerHTML = `
                <td>${item.nama_anak}</td>
                <td>${item.usia}</td>
                <td>${item.jenis_imunisasi}</td>
                <td>${item.status_imunisasi}</td>
            `;
      tableBody.appendChild(newRow);
    });
  } catch (error) {
    console.error("Error fetching data:", error);
  }
}

// Call fetchData when the page loads
window.onload = fetchData;
