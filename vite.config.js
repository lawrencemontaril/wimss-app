import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  build: {
    rollupOptions: {
      output: {
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith('.css')) {
            return 'css/[name][extname]';
          }
          return '[name][extname]';
        },
      },
    },
  },
  // server: {
  //   host: '0.0.0.0', // Listen on all addresses, including LAN
  //   port: 5173, // You can change this to any available port
  //   hmr: {
  //     host: '192.168.128.106', // Replace with your actual LAN IP
  //     port: 5173, // This should match the server port
  //   },
  // },
});
