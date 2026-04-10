// import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

// document.addEventListener('DOMContentLoaded', function() {
//     document.querySelectorAll('form[data-afspraak-id]').forEach(form => {
//         form.addEventListener('submit', async function(e) {
//             e.preventDefault();
            
//             const afspraakId = this.dataset.afspraakId;
//             const formData = new FormData(this);
            
//             // Add afspraak_id to the form data
//             formData.append('afspraak_id', afspraakId);
            
//             console.log('Form submitted for afspraak:', afspraakId);
//             console.log('Form data:', {
//                 afspraak_id: afspraakId,
//                 uren: formData.get('uren'),
//                 materialen: formData.get('materialen')
//             });
            
//             try {
//                 const response = await fetch(`/monteur/${afspraakId}/save`, {
//                     method: 'POST',
//                     body: formData,
//                     headers: {
//                         'Accept': 'application/json'
//                     }
//                 });
                
//                 console.log('Response status:', response.status);
//                 console.log('Response ok:', response.ok);
                
//                 const data = await response.json();
//                 console.log('Response data:', data);
                
//                 if (response.ok) {
//                     alert('Taak opgeslagen! Status gewijzigd naar Afgerond');
//                     location.reload();
//                 } else {
//                     alert('Er is een fout opgetreden: ' + (data.message || 'Onbekend'));
//                 }
//             } catch (error) {
//                 console.error('Error:', error);
//                 alert('Er is een fout opgetreden: ' + error.message);
//             }
//         });
//     });
// });
