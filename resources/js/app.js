import './bootstrap';
import 'preline';


document.getElementById('accessibilityButton').addEventListener('click', function() {
	console.log('wefwe');
	const body = document.body;
	

	// Переключаем классы для режима доступности
	body.classList.toggle('text-xl');
	body.classList.toggle('leading-relaxed');
	body.classList.toggle('bg-black');
	body.classList.toggle('text-white');
	body.classList.toggle('text-black');

	// Сохраняем состояние в localStorage
	if (body.classList.contains('text-xl')) {
		localStorage.setItem('accessibilityMode', 'enabled');
	} else {
		localStorage.setItem('accessibilityMode', 'disabled');
	}
});

// Проверяем состояние при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
	if (localStorage.getItem('accessibilityMode') === 'enabled') {
		document.body.classList.add('text-xl', 'leading-relaxed', 'bg-black', 'text-white', 'bg-yellow-300', 'text-black');
	}
});


async function sendMessage() {
	const inputField = document.getElementById("userInput");
	const messageContainer = document.getElementById("messages");
	const userMessage = inputField.value.trim();
	if (!userMessage) return;

	const userDiv = document.createElement("div");
	userDiv.className = "p-2 bg-blue-200 rounded-lg self-end text-right my-1";
	userDiv.textContent = userMessage;
	messageContainer.appendChild(userDiv);
	inputField.value = "";
	messageContainer.scrollTop = messageContainer.scrollHeight;

	try {
		const response = await fetch("https://openrouter.ai/api/v1/chat/completions", {
			method: "POST",
			headers: {
				"Authorization": "Bearer <OPENROUTER_API_KEY>",
				"Content-Type": "application/json"
			},
			body: JSON.stringify({
				"model": "deepseek/deepseek-r1",
				"messages": [{ "role": "user", "content": userMessage }]
			})
		});

		const data = await response.json();
		if (data.choices && data.choices.length > 0) {
			const assistantDiv = document.createElement("div");
			assistantDiv.className = "p-2 bg-gray-200 rounded-lg self-start text-left my-1";
			assistantDiv.textContent = data.choices[0].message.content;
			messageContainer.appendChild(assistantDiv);
			messageContainer.scrollTop = messageContainer.scrollHeight;
		}
	} catch (error) {
		console.error("Error fetching response:", error);
	}
}