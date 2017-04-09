<?php

use \Phan\Issue;

/**
 * This configuration will be read and overlayed on top of the
 * default configuration. Command line arguments will be applied
 * after this file is read.
 *
 * @see src/Phan/Config.php
 * See Config for all configurable options.
 *
 * A Note About Paths
 * ==================
 *
 * Files referenced from this file should be defined as
 *
 * ```
 *   Config::projectPath('relative_path/to/file')
 * ```
 *
 * where the relative path is relative to the root of the
 * project which is defined as either the working directory
 * of the phan executable or a path passed in via the CLI
 * '-d' flag.
 */
return [

    // If true, missing properties will be created when
    // they are first seen. If false, we'll report an
    // error message.
    "allow_missing_properties" => false,

    // Allow null to be cast as any type and for any
    // type to be cast to null.
    "null_casts_as_any_type" => false,

    // If enabled, scalars (int, float, bool, string, null)
    // are treated as if they can cast to each other.
    'scalar_implicit_cast' => false,

    // If true, seemingly undeclared variables in the global
    // scope will be ignored. This is useful for projects
    // with complicated cross-file globals that you have no
    // hope of fixing.
    'ignore_undeclared_variables_in_global_scope' => false,

    // Backwards Compatibility Checking
    'backward_compatibility_checks' => false,

    // If enabled, check all methods that override a
    // parent method to make sure its signature is
    // compatible with the parent's. This check
    // can add quite a bit of time to the analysis.
    'analyze_signature_compatibility' => true,

    // Set to true in order to attempt to detect dead
    // (unreferenced) code. Keep in mind that the
    // results will only be a guess given that classes,
    // properties, constants and methods can be referenced
    // as variables (like `$class->$property` or
    // `$class->$method()`) in ways that we're unable
    // to make sense of.
    'dead_code_detection' => false,

    // Run a quick version of checks that takes less
    // time
    "quick_mode" => false,

    // If true, then try to simplify AST into a form which improves Phan's type inference.
    // E.g. rewrites `if (!is_string($foo)) { return; } b($foo);`
    // into `if (is_string($foo)) {b($foo);} else {return;}`
    // This may conflict with 'dead_code_detection'
    // This slows down analysis noticeably.
    "simplify_ast" => true,

    // Enable or disable support for generic templated
    // class types.
    'generic_types_enabled' => true,

    // By default, Phan will not analyze all node types
    // in order to save time. If this config is set to true,
    // Phan will dig deeper into the AST tree and do an
    // analysis on all nodes, possibly finding more issues.
    //
    // See \Phan\Analysis::shouldVisit for the set of skipped
    // nodes.
    'should_visit_all_nodes' => true,

    // Override if runkit.superglobal ini directive is used.
    // See Phan\Config.
    'runkit_superglobals' => [],

    // Override to hardcode existence and types of (non-builtin) globals.
    // Class names must be prefixed with '\\'.
    'globals_type_map' => [],

    // The minimum severity level to report on. This can be
    // set to Issue::SEVERITY_LOW, Issue::SEVERITY_NORMAL or
    // Issue::SEVERITY_CRITICAL.
    'minimum_severity' => Issue::SEVERITY_LOW,

    // Add any issue types (such as 'PhanUndeclaredMethod')
    // here to inhibit them from being reported
    'suppress_issue_types' => [
        'PhanParamSignatureMismatch',  // PhanParamSignatureRealMismatch is more accurate.
    ],

    // If empty, no filter against issues types will be applied.
    // If non-empty, only issues within the list will be emitted
    // by Phan.
    'whitelist_issue_types' => [
        // 'PhanAccessMethodPrivate',
        // 'PhanAccessMethodProtected',
        // 'PhanAccessNonStaticToStatic',
        // 'PhanAccessPropertyPrivate',
        // 'PhanAccessPropertyProtected',
        // 'PhanAccessSignatureMismatch',
        // 'PhanAccessSignatureMismatchInternal',
        // 'PhanAccessStaticToNonStatic',
        // 'PhanCompatibleExpressionPHP7',
        // 'PhanCompatiblePHP7',
        // 'PhanContextNotObject',
        // 'PhanDeprecatedClass',
        // 'PhanDeprecatedFunction',
        // 'PhanDeprecatedProperty',
        // 'PhanEmptyFile',
        // 'PhanNonClassMethodCall',
        // 'PhanNoopArray',
        // 'PhanNoopClosure',
        // 'PhanNoopConstant',
        // 'PhanNoopProperty',
        // 'PhanNoopVariable',
        // 'PhanParamRedefined',
        // 'PhanParamReqAfterOpt',
        // 'PhanParamSignatureMismatch',
        // 'PhanParamSignatureMismatchInternal',
        // 'PhanParamSpecial1',
        // 'PhanParamSpecial2',
        // 'PhanParamSpecial3',
        // 'PhanParamSpecial4',
        // 'PhanParamTooFew',
        // 'PhanParamTooFewInternal',
        // 'PhanParamTooMany',
        // 'PhanParamTooManyInternal',
        // 'PhanParamTypeMismatch',
        // 'PhanParentlessClass',
        // 'PhanRedefineClass',
        // 'PhanRedefineClassInternal',
        // 'PhanRedefineFunction',
        // 'PhanRedefineFunctionInternal',
        // 'PhanStaticCallToNonStatic',
        // 'PhanSyntaxError',
        // 'PhanTraitParentReference',
        // 'PhanTypeArrayOperator',
        // 'PhanTypeArraySuspicious',
        // 'PhanTypeComparisonFromArray',
        // 'PhanTypeComparisonToArray',
        // 'PhanTypeConversionFromArray',
        // 'PhanTypeInstantiateAbstract',
        // 'PhanTypeInstantiateInterface',
        // 'PhanTypeInvalidLeftOperand',
        // 'PhanTypeInvalidRightOperand',
        // 'PhanTypeMismatchArgument',
        // 'PhanTypeMismatchArgumentInternal',
        // 'PhanTypeMismatchDefault',
        // 'PhanTypeMismatchForeach',
        // 'PhanTypeMismatchProperty',
        // 'PhanTypeMismatchReturn',
        // 'PhanTypeMissingReturn',
        // 'PhanTypeNonVarPassByRef',
        // 'PhanTypeParentConstructorCalled',
        // 'PhanTypeVoidAssignment',
        // 'PhanUnanalyzable',
        // 'PhanUndeclaredClass',
        // 'PhanUndeclaredClassCatch',
        // 'PhanUndeclaredClassConstant',
        // 'PhanUndeclaredClassInstanceof',
        // 'PhanUndeclaredClassMethod',
        // 'PhanUndeclaredClassReference',
        // 'PhanUndeclaredConstant',
        // 'PhanUndeclaredExtendedClass',
        // 'PhanUndeclaredFunction',
        // 'PhanUndeclaredInterface',
        // 'PhanUndeclaredMethod',
        // 'PhanUndeclaredProperty',
        // 'PhanUndeclaredStaticMethod',
        // 'PhanUndeclaredStaticProperty',
        // 'PhanUndeclaredTrait',
        // 'PhanUndeclaredTypeParameter',
        // 'PhanUndeclaredTypeProperty',
        // 'PhanUndeclaredVariable',
        // 'PhanUnreferencedClass',
        // 'PhanUnreferencedConstant',
        // 'PhanUnreferencedMethod',
        // 'PhanUnreferencedProperty',
        // 'PhanVariableUseClause',
    ],

    // A list of files to include in analysis
    'file_list' => [
        // 'vendor/phpunit/phpunit/src/Framework/TestCase.php',
    ],

    // A file list that defines files that will be excluded
    // from parsing and analysis and will not be read at all.
    //
    // This is useful for excluding hopelessly unanalyzable
    // files that can't be removed for whatever reason.
    'exclude_file_list' => [],

    // The number of processes to fork off during the analysis
    // phase.
    'processes' => 1,

    // A list of directories that should be parsed for class and
    // method information. After excluding the directories
    // defined in exclude_analysis_directory_list, the remaining
    // files will be statically analyzed for errors.
    //
    // Thus, both first-party and third-party code being used by
    // your application should be included in this list.
    'directory_list' => [
        'core/lib',
        'core/modules',
        'core/includes',
        'vendor',
    ],

    // List of case-insensitive file extensions supported by Phan.
    // (e.g. php, html, htm)
    'analyzed_file_extensions' => [
        'php',
        'inc',
        'install',
        'module',
    ],

    // A directory list that defines files that will be excluded
    // from static analysis, but whose class and method
    // information should be included.
    //
    // Generally, you'll want to include the directories for
    // third-party code (such as "vendor/") in this list.
    //
    // n.b.: If you'd like to parse but not analyze 3rd
    //       party code, directories containing that code
    //       should be added to the `directory_list` as
    //       to `exclude_analysis_directory_list`.
    "exclude_analysis_directory_list" => [
        'vendor/',
        'core/tests',
        'core/tests/Drupal/FunctionalJavascriptTests/Tests',
        'core/tests/Drupal/Tests',
        'core/profiles/standard/tests',
        'core/profiles/minimal/src/Tests',
        'core/profiles/testing/modules/drupal_system_listing_compatible_test/src/Tests',
        'core/modules/options/tests',
        'core/modules/options/src/Tests',
        'core/modules/migrate_drupal_ui/src/Tests',
        'core/modules/book/tests',
        'core/modules/book/src/Tests',
        'core/modules/inline_form_errors/tests',
        'core/modules/datetime_range/tests',
        'core/modules/datetime_range/src/Tests',
        'core/modules/help/tests',
        'core/modules/ban/tests',
        'core/modules/filter/tests',
        'core/modules/filter/src/Tests',
        'core/modules/views_ui/tests',
        'core/modules/views_ui/src/Tests',
        'core/modules/basic_auth/tests',
        'core/modules/basic_auth/src/Tests',
        'core/modules/language/tests',
        'core/modules/language/src/Tests',
        'core/modules/contact/tests',
        'core/modules/contact/src/Tests',
        'core/modules/config_translation/tests',
        'core/modules/config_translation/src/Tests',
        'core/modules/serialization/tests',
        'core/modules/serialization/src/Tests',
        'core/modules/ckeditor/tests',
        'core/modules/ckeditor/src/Tests',
        'core/modules/history/src/Tests',
        'core/modules/taxonomy/tests',
        'core/modules/taxonomy/src/Tests',
        'core/modules/shortcut/tests',
        'core/modules/shortcut/src/Tests',
        'core/modules/file/tests',
        'core/modules/file/src/Tests',
        'core/modules/locale/tests',
        'core/modules/locale/src/Tests',
        'core/modules/path/tests',
        'core/modules/path/src/Tests',
        'core/modules/forum/tests',
        'core/modules/forum/src/Tests',
        'core/modules/dblog/tests',
        'core/modules/dblog/src/Tests',
        'core/modules/rest/tests',
        'core/modules/rest/src/Tests',
        'core/modules/content_moderation/tests',
        'core/modules/content_moderation/src/Tests',
        'core/modules/big_pipe/tests',
        'core/modules/big_pipe/src/Tests',
        'core/modules/action/tests',
        'core/modules/action/src/Tests',
        'core/modules/quickedit/tests',
        'core/modules/quickedit/src/Tests',
        'core/modules/search/tests',
        'core/modules/search/src/Tests',
        'core/modules/menu_ui/tests',
        'core/modules/menu_ui/src/Tests',
        'core/modules/syslog/tests',
        'core/modules/syslog/src/Tests',
        'core/modules/page_cache/tests',
        'core/modules/page_cache/src/Tests',
        'core/modules/editor/tests',
        'core/modules/editor/src/Tests',
        'core/modules/hal/tests',
        'core/modules/hal/src/Tests',
        'core/modules/contextual/tests',
        'core/modules/contextual/src/Tests',
        'core/modules/datetime/tests',
        'core/modules/datetime/src/Tests',
        'core/modules/color/tests',
        'core/modules/text/tests',
        'core/modules/text/src/Tests',
        'core/modules/dynamic_page_cache/tests',
        'core/modules/dynamic_page_cache/src/Tests',
        'core/modules/block_place/tests',
        'core/modules/breakpoint/tests',
        'core/modules/field/tests',
        'core/modules/field/src/Tests',
        'core/modules/link/tests',
        'core/modules/link/src/Tests',
        'core/modules/update/tests',
        'core/modules/update/src/Tests',
        'core/modules/field_ui/tests',
        'core/modules/field_ui/src/Tests',
        'core/modules/responsive_image/tests',
        'core/modules/responsive_image/src/Tests',
        'core/modules/content_translation/tests',
        'core/modules/content_translation/src/Tests',
        'core/modules/telephone/tests',
        'core/modules/telephone/src/Tests',
        'core/modules/outside_in/tests',
        'core/modules/outside_in/src/Tests',
        'core/modules/views/tests',
        'core/modules/views/src/Tests',
        'core/modules/block_content/tests',
        'core/modules/block_content/src/Tests',
        'core/modules/user/tests',
        'core/modules/user/src/Tests',
        'core/modules/block/tests',
        'core/modules/block/src/Tests',
        'core/modules/statistics/tests',
        'core/modules/statistics/src/Tests',
        'core/modules/comment/tests',
        'core/modules/comment/src/Tests',
        'core/modules/system/tests',
        'core/modules/system/tests/modules/accept_header_routing_test/tests',
        'core/modules/system/src/Tests',
        'core/modules/tracker/tests',
        'core/modules/tracker/src/Tests',
        'core/modules/migrate_drupal/tests',
        'core/modules/migrate_drupal/src/Tests',
        'core/modules/migrate/tests',
        'core/modules/menu_link_content/tests',
        'core/modules/menu_link_content/src/Tests',
        'core/modules/node/tests',
        'core/modules/node/src/Tests',
        'core/modules/toolbar/tests',
        'core/modules/toolbar/src/Tests',
        'core/modules/aggregator/tests',
        'core/modules/aggregator/src/Tests',
        'core/modules/rdf/tests',
        'core/modules/rdf/src/Tests',
        'core/modules/config/tests',
        'core/modules/config/src/Tests',
        'core/modules/simpletest/tests',
        'core/modules/simpletest/src/Tests',
        'core/modules/image/tests',
        'core/modules/image/src/Tests',
        'core/modules/tour/tests',
        'core/modules/tour/src/Tests',
    ],

    // A list of plugin files to execute
    'plugins' => [
        // NOTE: src/Phan/Language/Internal/FunctionSignatureMap.php mixes value without key as return type with values having keys deliberately.
        // '.phan/plugins/DuplicateArrayKeyPlugin.php',

        // NOTE: This plugin only produces correct results when
        //       Phan is run on a single core (-j1).
        // '.phan/plugins/UnusedSuppressionPlugin.php',
    ],

];
