## Tic Tac Toe Game

https://github.com/user-attachments/assets/1834acf3-aa23-41e3-bc34-ffcf9f630705

This is a simple Tic Tac Toe game implemented in Laravel, Livewire with Volt and Reverb. The game allows two players to take turns marking
spaces on a 3x3 grid until one of them wins or the game ends in a draw. It allows players to play against each other in real-time.

### Stack
- PHP 8.3+
- Laravel 12
- Livewire 3
- Reverb
- Tailwind CSS

### Libs
- [ClipboardJS](https://clipboardjs.com/)
- [JSConfetti](https://github.com/loonywizard/js-confetti)

### Installation
To run this project, you need to have PHP and Composer installed on your environment.

1. Clone the repository:

```bash
git clone https://github.com/lauroguedes/tic-tac-toe-game.git
```

2. Navigate to the project directory:

```bash
cd tic-tac-toe-game
```

3. Install the project dependencies using Composer:

```bash
composer install
```

4. Install the project dependencies using NPM:

```bash
npm install
```

5. Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

6. Generate an application key:

```bash
php artisan key:generate
```

7. Run the reverb installation command:

```bash
php artisan reverb:install
```

8. Start the Reverb server:

```bash
php artisan reverb:start
```

9. Start the front end server:

```bash
npm run dev
```

10. Start the development server:

```bash
php artisan serve
```

10. Open your web browser and visit `http://localhost` to access the Tic Tac Toe game.
