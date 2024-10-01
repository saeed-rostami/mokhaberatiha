

const inputs = document.querySelectorAll('.otp-input');

        inputs.forEach((input, index) => {
            input.addEventListener('input', (event) => {
                const value = event.target.value;

                // Move to next input if a value is entered and not the last input
                if (value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }

                // Backspace event - go to previous input if empty and not the first input
                input.addEventListener('keydown', (e) => {
                    if (e.key === "Backspace" && !value && index > 0) {
                        inputs[index - 1].focus();
                    }
                });
            });
        });
