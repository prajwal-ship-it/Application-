document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("applicationForm");
    const statusMessage = document.getElementById("statusMessage");
  
    form.addEventListener("submit", async (event) => {
      event.preventDefault();
      
      const formData = new FormData(form);
      try {
        const response = await fetch('process.php', {
          method: 'POST',
          body: formData
        });
  
        const result = await response.text();
        statusMessage.style.display = "block";
        statusMessage.style.backgroundColor = "#d4edda";
        statusMessage.style.color = "#155724";
        statusMessage.innerHTML = result;
      } catch (error) {
        statusMessage.style.display = "block";
        statusMessage.style.backgroundColor = "#f8d7da";
        statusMessage.style.color = "#721c24";
        statusMessage.innerHTML = "An error occurred. Please try again.";
      }
  
      form.reset();
    });
  });
  