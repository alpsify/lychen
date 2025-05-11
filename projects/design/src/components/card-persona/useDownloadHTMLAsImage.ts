import type { ObjectValues } from '@lychen/typescript-util-object/Object';
import { toPng, toSvg } from 'html-to-image';
import { onMounted, ref } from 'vue';

export const EXCLUDED_CLASS = 'exclude-from-download';
export const SUPPORTED_EXTENSION = {
  Png: 'png',
  Svg: 'svg',
} as const;

export type SupportedExtension = ObjectValues<typeof SUPPORTED_EXTENSION>;

export function useDownloadHTMLAsImage(
  id: string,
  fileName: string = 'image',
  extension: SupportedExtension = SUPPORTED_EXTENSION.Png,
) {
  const element = ref<HTMLElement | null>(null);

  onMounted(() => {
    element.value = document.getElementById(id);
  });

  function filter(node: HTMLElement) {
    // Exclude the button itself from the generated image
    return !node.classList?.contains(EXCLUDED_CLASS);
  }

  async function download(extension: SupportedExtension = SUPPORTED_EXTENSION.Png) {
    if (!element.value) {
      return;
    }

    if (!(element.value instanceof HTMLElement)) {
      return;
    }

    let dataUrl = null;
    switch (extension) {
      case SUPPORTED_EXTENSION.Png:
        dataUrl = await toPng(element.value, { cacheBust: true, filter });
        break;
      case SUPPORTED_EXTENSION.Svg:
        dataUrl = await toSvg(element.value, { cacheBust: true, filter });
        break;
    }

    if (!dataUrl) {
      return;
    }

    const link = document.createElement('a');
    link.download = `${fileName}.${extension}`;
    link.href = dataUrl;
    link.click();
  }

  return {
    download,
  };
}
