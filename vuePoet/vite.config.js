import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";

//wordpress\wp-content\plugins\vuePoet

// https://vitejs.dev/config/

export default defineConfig({
  plugins: [vue()]
})

/*export default defineConfig(({ command, mode, isSsrBuild, isPreview }) => {
  if (command === "serve") {
    return {
      // dev specific config
      plugins: [
        vue()
      ],
      resolve: {
        alias: {
          "@": fileURLToPath(new URL("./src", import.meta.url)),
        }
      },
      base: "wordpress/wp-content/plugins/vuePoet/"
    };
  } else {
    // command === 'build'
    return {
      // build specific config
    };
  }
});*/
