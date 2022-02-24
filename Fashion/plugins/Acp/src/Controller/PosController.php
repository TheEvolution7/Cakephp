<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Core\Plugin;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;
use Cake\Utility\Inflector;
use Cake\Core\Configure;

use DirectoryIterator;

use Sepia\PoParser\SourceHandler\FileSystem;
use Sepia\PoParser\Parser;
use Sepia\PoParser\Catalog\Entry;
use Sepia\PoParser\PoCompiler;

use Cake\Cache\Cache;

class PosController extends AppController
{
    /**
     * Catalog 
     *
     * @var array
     */
    private $_catalog;
    /**
     * Params 
     *
     * @var array
     */
    private $_params;

    /**
     * Paths to use when looking for strings
     *
     * @var array
     */
    private $_paths = [];

    /**
     * Files from where to extract
     *
     * @var array
     */
    private $_files = [];

    /**
     * Merge all domain strings into the default.pot file
     *
     * @var bool
     */
    private $_merge = false;

    /**
     * Current file being processed
     *
     * @var string|null
     */
    private $_file;

    /**
     * Contains all content waiting to be write
     *
     * @var array
     */
    private $_storage = [];

    /**
     * Extracted tokens
     *
     * @var array
     */
    private $_tokens = [];

    /**
     * Extracted strings indexed by domain.
     *
     * @var array
     */
    private $_translations = [];

    /**
     * Destination path
     *
     * @var string|null
     */
    private $_output;

    /**
     * An array of directories to exclude.
     *
     * @var array
     */
    private $_exclude = [];

    /**
     * Holds the validation string domain to use for validation messages when extracting
     *
     * @var string
     */
    private $_validationDomain = 'default';

    /**
     * Holds whether this call should extract the CakePHP Lib messages
     *
     * @var bool
     */
    private $_extractCore = false;

    /**
     * No welcome message.
     *
     * @return void
     */


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    private $_fileName = 'default';


    public function index($langLocale = null, $isAcp = false)
    {
        $this->viewBuilder()->setLayout('default2');
        if (empty($langLocale)) {

            $langLocale = Configure::read('App.defaultLocale');
        }

        $file = 'default';
        $plugin = '';

        if (!empty($isAcp)) {
            $file = 'acp';

            $plugin = 'plugins' . DS . 'Acp';
        }



        $fileHandler = new FileSystem(ROOT . DS . $plugin . DS . 'src' . DS . 'Locale' . DS . $langLocale . DS . $file . '.po');
        $parser = new Parser($fileHandler);
        $catalog = $parser->parse();
        $this->set('entries', $catalog->getEntries());
    }

    public function edit($langLocale = null, $isAcp = false)
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            if (empty($langLocale)) {

                $langLocale = Configure::read('App.defaultLocale');
            }


            $requestData = $this->request->getData();
            
            $file = 'default';
            $plugin = '';

            if (!empty($isAcp)) {
                $file = 'acp';

                $plugin = 'plugins' . DS . 'Acp';
            }


            $fileHandler = new FileSystem(ROOT . DS . $plugin . DS . 'src' . DS . 'Locale' . DS . $langLocale . DS . $file . '.po');
            $poParser = new Parser($fileHandler);
            $catalog  = $poParser->parse();

            $entry = $catalog
                ->getEntry($requestData['msgId'])
                ->setMsgStr($requestData['msgStr']);

            $catalog->addEntry($entry);

            $compiler = new PoCompiler();
            $fileHandler->save($compiler->compile($catalog));
            
            Cache::clearAll(false);

            $response = ['status' => 1, 'message' => __d('acp', 'Update success')];  
        } else {
            $response = ['status' => 0, 'message' => __d('acp', 'Update error')];
        }


        echo json_encode($response);
    }

    private function _getPaths()
    {
        $defaultPath = APP;
        $this->_paths[] = $defaultPath;
        $dir = new DirectoryIterator(Configure::read('App.paths.plugins.0'));
        foreach ($dir as $dirPath) {
            if ($dirPath->isDir() && !$dirPath->isDot()) {
                $this->_paths[] = Plugin::classPath($dirPath->getBasename());
            }
        }
    }

    /**
     * Execution method always used for tasks
     *
     * @return void
     */
    public function main($langLocale = null, $isAcp = false)
    {
        if (empty($langLocale)) {

            $langLocale = Configure::read('App.defaultLocale');
        }


        if (!empty($isAcp)) {

            $this->_params['plugin'] = 'Acp';
        }

        // if (!empty($this->_params['exclude'])) {
        //     $this->_exclude = explode(',', $this->_params['exclude']);
        // }
        // if (isset($this->_params['files']) && !is_array($this->_params['files'])) {
        //     $this->_files = explode(',', $this->_params['files']);
        // }

        if (isset($this->_params['paths'])) {
            $this->_paths = explode(',', $this->_params['paths']);
        } elseif (isset($this->_params['plugin'])) {
            $plugin = Inflector::camelize($this->_params['plugin']);
            if (!Plugin::loaded($plugin)) {
                Plugin::load($plugin);
            }
            $this->_paths = [Plugin::classPath($plugin)];
            $this->_params['plugin'] = $plugin;
        } else {
            $this->_getPaths();
        }

        // if (isset($this->_params['extract-core'])) {
        //     $this->_extractCore = !(strtolower($this->_params['extract-core']) === 'no');
        // } else {
            // $response = $this->in('Would you like to extract the messages from the CakePHP core?', ['y', 'n'], 'n');
            // $this->_extractCore = strtolower($response) === 'y';
        // }

        // if (!empty($this->_params['exclude-plugins']) && $this->_isExtractingApp()) {
        //     $this->_exclude = array_merge($this->_exclude, App::path('Plugin'));
        // }

        if (!empty($this->_params['validation-domain'])) {
            $this->_validationDomain = $this->_params['validation-domain'];
        }

        // if ($this->_extractCore) {
        //     $this->_paths[] = CAKE;
        // }

        $this->_output = $this->_paths[0] . 'Locale' . DS . $langLocale;

        // if (isset($this->_params['merge'])) {
        //     $this->_merge = !(strtolower($this->_params['merge']) === 'no');
        // } else {
        //     debug(242);
        //     // $this->out();
        //     // $response = $this->in('Would you like to merge all domain strings into the default.pot file?', ['y', 'n'], 'n');
        //     // $this->_merge = strtolower($response) === 'y';
        // }

        if (empty($this->_files)) {
            $this->_searchFiles();
        }

        $this->_output = rtrim($this->_output, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        
        if (!$this->_isPathUsable($this->_output)) {
            debug('loi '. 254);
            $this->err(sprintf('The output directory %s was not found or writable.', $this->_output));
            // $this->_stop();

            return;
        }

        $this->_extract();

        $this->Flash->success(__d('acp', 'Update success.'));
        $this->redirect($this->referer());
    }

    /**
     * Add a translation to the internal translations property
     *
     * Takes care of duplicate translations
     *
     * @param string $domain The domain
     * @param string $msgid The message string
     * @param array $details Context and plural form if any, file and line references
     * @return void
     */
    private function _addTranslation($domain, $msgid, $details = [])
    {
        $context = isset($details['msgctxt']) ? $details['msgctxt'] : '';

        if (empty($this->_translations[$domain][$msgid][$context])) {
            $this->_translations[$domain][$msgid][$context] = [
                'msgid_plural' => false
            ];
        }

        if (isset($details['msgid_plural'])) {
            $this->_translations[$domain][$msgid][$context]['msgid_plural'] = $details['msgid_plural'];
        }

        if (isset($details['file'])) {
            $line = isset($details['line']) ? $details['line'] : 0;
            $this->_translations[$domain][$msgid][$context]['references'][$details['file']][] = $line;
        }
    }

    /**
     * Extract text
     *
     * @return void
     */
    private function _extract()
    {

        $this->_extractTokens();
        $this->_buildFiles();
        $this->_writeFiles();
        $this->_paths = $this->_files = $this->_storage = [];
        $this->_translations = $this->_tokens = [];
    }

    /**
     * Extract tokens out of all files to be processed
     *
     * @return void
     */
    private function _extractTokens()
    {
        
        if(isset($this->_params['plugin'])){
            $file = new File($this->_output . Inflector::camelize($this->_params['plugin']) . '.po');
        }else{
            $file = new File($this->_output . 'default.po');
        }

        if($file->exists()){
            $fileHandler = new FileSystem($file->path);
            $parser = new Parser($fileHandler);
            $this->_catalog = $parser->parse();
        }


        foreach ($this->_files as $file) {
            $this->_file = $file;

            $code = file_get_contents($file);
            $allTokens = token_get_all($code);

            $this->_tokens = [];
            foreach ($allTokens as $token) {
                if (!is_array($token) || ($token[0] !== T_WHITESPACE && $token[0] !== T_INLINE_HTML)) {
                    $this->_tokens[] = $token;
                }
            }
            unset($allTokens);
            // $this->_parse('__', ['singular']);
            // $this->_parse('__n', ['singular', 'plural']);
            // $this->_parse('__d', ['domain', 'singular']);
            // $this->_parse('__dn', ['domain', 'singular', 'plural']);
            // $this->_parse('__x', ['context', 'singular']);
            // $this->_parse('__xn', ['context', 'singular', 'plural']);
            // $this->_parse('__dx', ['domain', 'context', 'singular']);
            // $this->_parse('__dxn', ['domain', 'context', 'singular', 'plural']);


            if (isset($this->_params['plugin'])) {
                $this->_parse('__d', ['domain', 'singular']);
            } else {
                $this->_parse('__', ['singular']);
            }
        }
    }

    /**
     * Parse tokens
     *
     * @param string $functionName Function name that indicates translatable string (e.g: '__')
     * @param array $map Array containing what variables it will find (e.g: domain, singular, plural)
     * @return void
     */
    private function _parse($functionName, $map)
    {
        $count = 0;
        $tokenCount = count($this->_tokens);

        while (($tokenCount - $count) > 1) {
            $countToken = $this->_tokens[$count];
            $firstParenthesis = $this->_tokens[$count + 1];
            if (!is_array($countToken)) {
                $count++;
                continue;
            }

            list($type, $string, $line) = $countToken;
            if (($type == T_STRING) && ($string === $functionName) && ($firstParenthesis === '(')) {
                $position = $count;
                $depth = 0;

                while (!$depth) {
                    if ($this->_tokens[$position] === '(') {
                        $depth++;
                    } elseif ($this->_tokens[$position] === ')') {
                        $depth--;
                    }
                    $position++;
                }

                $mapCount = count($map);
                $strings = $this->_getStrings($position, $mapCount);

                
                    if ($mapCount === count($strings)) {
                        $singular = null;
                        extract(array_combine($map, $strings));
                        $domain = isset($domain) ? $domain : 'default';
                        $details = [
                            'file' => $this->_file,
                            'line' => $line,
                        ];
                        if (isset($plural)) {
                            $details['msgid_plural'] = $plural;
                        }
                        if (isset($context)) {
                            $details['msgctxt'] = $context;
                        }

                        if (!empty($this->_catalog)) {
                            if (empty($this->_catalog->getEntry($singular))) {
                                $this->_addTranslation($domain, $singular, $details);
                            }
                        } else {
                            $this->_addTranslation($domain, $singular, $details);
                        }
                    } elseif (strpos($this->_file, CAKE_CORE_INCLUDE_PATH) === false) {
                        $this->_markerError($this->_file, $line, $functionName, $count);
                    }
            }
            $count++;
        }
    }

    /**
     * Build the translate template file contents out of obtained strings
     *
     * @return void
     */
    private function _buildFiles()
    {
        $paths = $this->_paths;
        $paths[] = realpath(APP) . DIRECTORY_SEPARATOR;

        usort($paths, function ($a, $b) {
            return strlen($a) - strlen($b);
        });
        foreach ($this->_translations as $domain => $translations) {
            foreach ($translations as $msgid => $contexts) {
                foreach ($contexts as $context => $details) {
                    $plural = $details['msgid_plural'];
                    $files = $details['references'];
                    $occurrences = [];
                    foreach ($files as $file => $lines) {
                        $lines = array_unique($lines);
                        $occurrences[] = $file . ':' . implode(';', $lines);
                    }
                    $occurrences = implode("\n#: ", $occurrences);
                    $header = '';
                    $header = '#: ' . str_replace(DIRECTORY_SEPARATOR, '/', str_replace($paths, '', $occurrences)) . "\n";

                    $sentence = '';
                    if ($context !== '') {
                        $sentence .= "msgctxt \"{$context}\"\n";
                    }
                    if ($plural === false) {
                        $sentence .= "msgid \"{$msgid}\"\n";
                        $sentence .= "msgstr \"{$msgid}\"\n\n";
                    } else {
                        $sentence .= "msgid \"{$msgid}\"\n";
                        $sentence .= "msgid_plural \"{$plural}\"\n";
                        $sentence .= "msgstr[0] \"{$msgid}\"\n";
                        $sentence .= "msgstr[1] \"{$msgid}\"\n\n";
                    }

                    if ($domain !== 'default' && $this->_merge) {
                        $this->_store('default', $header, $sentence);
                    } else {
                        $this->_store($domain, $header, $sentence);
                    }
                }
            }
        }
    }

    /**
     * Prepare a file to be stored
     *
     * @param string $domain The domain
     * @param string $header The header content.
     * @param string $sentence The sentence to store.
     * @return void
     */
    private function _store($domain, $header, $sentence)
    {
        if (!isset($this->_storage[$domain])) {
            $this->_storage[$domain] = [];
        }
        if (!isset($this->_storage[$domain][$sentence])) {
            $this->_storage[$domain][$sentence] = $header;
        } else {
            $this->_storage[$domain][$sentence] .= $header;
        }
    }

    /**
     * Write the files that need to be stored
     *
     * @return void
     */
    private function _writeFiles()
    {
        $overwriteAll = false;
        if (!empty($this->_params['overwrite'])) {
            $overwriteAll = true;
        }
        foreach ($this->_storage as $domain => $sentences) {
            $output = null;//$this->_writeHeader();
            foreach ($sentences as $sentence => $header) {
                $output .= $header . $sentence;
            }
            // Remove vendor prefix if present.
            $slashPosition = strpos($domain, '/');
            if ($slashPosition !== false) {
                $domain = substr($domain, $slashPosition + 1);
            }

            $filename = str_replace('/', '_', $domain) . '.po';
            $File = new File($this->_output . $filename);

            if (!empty($this->_catalog)) {
                $File->append($output);
            } else {
                $File->write($output);
            }
            $File->close();
        }
    }

    /**
     * Get the strings from the position forward
     *
     * @param int $position Actual position on tokens array
     * @param int $target Number of strings to extract
     * @return array Strings extracted
     */
    private function _getStrings(&$position, $target)
    {
        $strings = [];
        $count = count($strings);
        while ($count < $target && ($this->_tokens[$position] === ',' || $this->_tokens[$position][0] == T_CONSTANT_ENCAPSED_STRING || $this->_tokens[$position][0] == T_LNUMBER)) {
            $count = count($strings);
            if ($this->_tokens[$position][0] == T_CONSTANT_ENCAPSED_STRING && $this->_tokens[$position + 1] === '.') {
                $string = '';
                while ($this->_tokens[$position][0] == T_CONSTANT_ENCAPSED_STRING || $this->_tokens[$position] === '.') {
                    if ($this->_tokens[$position][0] == T_CONSTANT_ENCAPSED_STRING) {
                        $string .= $this->_formatString($this->_tokens[$position][1]);
                    }
                    $position++;
                }
                $strings[] = $string;
            } elseif ($this->_tokens[$position][0] == T_CONSTANT_ENCAPSED_STRING) {
                $strings[] = $this->_formatString($this->_tokens[$position][1]);
            } elseif ($this->_tokens[$position][0] == T_LNUMBER) {
                $strings[] = $this->_tokens[$position][1];
            }
            $position++;
        }

        return $strings;
    }

    /**
     * Format a string to be added as a translatable string
     *
     * @param string $string String to format
     * @return string Formatted string
     */
    private function _formatString($string)
    {
        $quote = substr($string, 0, 1);
        $string = substr($string, 1, -1);
        if ($quote === '"') {
            $string = stripcslashes($string);
        } else {
            $string = strtr($string, ["\\'" => "'", '\\\\' => '\\']);
        }
        $string = str_replace("\r\n", "\n", $string);

        return addcslashes($string, "\0..\37\\\"");
    }

    /**
     * Indicate an invalid marker on a processed file
     *
     * @param string $file File where invalid marker resides
     * @param int $line Line number
     * @param string $marker Marker found
     * @param int $count Count
     * @return void
     */
    private function _markerError($file, $line, $marker, $count)
    {
        $this->err(sprintf("Invalid marker content in %s:%s\n* %s(", $file, $line, $marker));
        $count += 2;
        $tokenCount = count($this->_tokens);
        $parenthesis = 1;

        while ((($tokenCount - $count) > 0) && $parenthesis) {
            if (is_array($this->_tokens[$count])) { 
                $this->err($this->_tokens[$count][1], false);
            } else {
                $this->err($this->_tokens[$count], false);
                if ($this->_tokens[$count] === '(') {
                    $parenthesis++;
                }

                if ($this->_tokens[$count] === ')') {
                    $parenthesis--;
                }
            }
            $count++;
        }
        $this->err("\n", true);
    }

    /**
     * Search files that may contain translatable strings
     *
     * @return void
     */
    private function _searchFiles()
    {
        $pattern = false;
        if (!empty($this->_exclude)) {
            $exclude = [];
            foreach ($this->_exclude as $e) {
                if (DIRECTORY_SEPARATOR !== '\\' && $e[0] !== DIRECTORY_SEPARATOR) {
                    $e = DIRECTORY_SEPARATOR . $e;
                }
                $exclude[] = preg_quote($e, '/');
            }
            $pattern = '/' . implode('|', $exclude) . '/';
        }
        foreach ($this->_paths as $path) {
            $path = realpath($path) . DIRECTORY_SEPARATOR;
            $Folder = new Folder($path);
            $files = $Folder->findRecursive('.*\.(php|ctp|thtml|inc|tpl)', true);
            if (!empty($pattern)) {
                $files = preg_grep($pattern, $files, PREG_GREP_INVERT);
                $files = array_values($files);
            }
            $this->_files = array_merge($this->_files, $files);
        }
        $this->_files = array_unique($this->_files);
    }

    /**
     * Returns whether this execution is meant to extract string only from directories in folder represented by the
     * APP constant, i.e. this task is extracting strings from same application.
     *
     * @return bool
     */
    private function _isExtractingApp()
    {
        return $this->_paths === [APP];
    }

    /**
     * Checks whether or not a given path is usable for writing.
     *
     * @param string $path Path to folder
     * @return bool true if it exists and is writable, false otherwise
     */
    private function _isPathUsable($path)
    {
        if (!is_dir($path)) {
            mkdir($path, 0777, false);
        }

        return is_dir($path) && is_writable($path);
    }

    private function err($value = null)
    {
        echo $value;
    }
}
