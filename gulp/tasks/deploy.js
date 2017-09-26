import gulp from 'gulp';
import runSequence from 'run-sequence';

gulp.task('deploy2', () => runSequence('html-prod', 'lint', 'scripts-prod', 'styles-prod', 'static', 'images', 'fonts', 'service-worker-prod'));
gulp.task('deploy', () => runSequence('html-prod',  'scripts-prod', 'styles-prod', 'static', 'images', 'fonts', 'service-worker-prod'));
