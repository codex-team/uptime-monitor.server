<?php
declare(strict_types=1);

namespace App\Components\Base;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig
{
    /**
     * Path to templates folder
     *
     * @var string
     */
    private const TEMPLATES_PATH = ROOT . '/src/templates';

    /**
     * Path to compiled templates folder
     *
     * @var string
     */
    private const TEMPLATES_CACHE_PATH = ROOT . '/app/cache/templates';

    /**
     * @var Environment
     */
    private static $twig;

    /**
     * Render templates
     *
     * @param string $template
     * @param array  $variables
     *
     * @return string
     */
    public static function renderTwigTemplate(string $template, array $variables = []): string
    {
        if (!isset(self::$twig)) {
            $loader = new FilesystemLoader(self::TEMPLATES_PATH);
            self::$twig = new Environment($loader, [
                'cache' => self::TEMPLATES_CACHE_PATH,
            ]);
        }

        /**
         * TODO: реализовать
         * catch(LoadError $e) {
         * throw new JSONResponse(200, 'Ошибка при загрузке');
         * } catch (RuntimeErr $e) {
         * throw new JSONResponse(200, 'Ошибка рантайма');
         * } catch (Syntaxt) {
         * thrown new JSON....(200, 'Синтаксическая ошибка'):
         * } catch (\Exception) {
         * throw new JSON...(200, 'Какая-то ошибка, разработчики уже разбираются')
         */
        return self::$twig->render($template, $variables);
    }
}
