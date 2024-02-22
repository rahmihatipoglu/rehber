# rehber

This template should help get you started developing with Vue 3 in Vite on 09.02.2024 Friday

## Amaç

Bu projede genel olarak bir telefon rehberi işlemleri gerçekleştirilecektir. İlerleyen aşamada:

- Kişilerin birimleri
- Kişilerin görevleri
  şeklinde geliştirilecektir.

## Veritabanı

````SQL
CREATE TABLE `kisiler` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ad` varchar(50) NOT NULL,
  `telefon` varchar(10) NOT NULL
) COLLATE 'utf8mb3_turkish_ci';```






## Recommended IDE Setup

[VSCode](https://code.visualstudio.com/) + [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) (and disable Vetur) + [TypeScript Vue Plugin (Volar)](https://marketplace.visualstudio.com/items?itemName=Vue.vscode-typescript-vue-plugin).

## Customize configuration

See [Vite Configuration Reference](https://vitejs.dev/config/).

## Project Setup

```sh
npm install
````

### Compile and Hot-Reload for Development

```sh
npm run dev
```

### Compile and Minify for Production

```sh
npm run build
```

### Lint with [ESLint](https://eslint.org/)

```sh
npm run lint
```
