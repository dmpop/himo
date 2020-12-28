# Sigh

Sigh provides a simple web interface to control any supported camera via gPhoto2. Sigh stands for **S**imple **I**nterface for **g**P**h**oto2. Sigh runs on any Linux machine.

## Rationale

Most modern cameras can be controlled using dedicated apps, so it may seem that Sigh tries to solve a non-existing problem in a somewhat more convoluted way. However, Sigh has a number of important advantages.

- No proprietary software. Sigh is an open-source software based on PHP and gPhoto2.
- Sigh runs in any browser, so you are not limited to iOS or Android devices.
- The tool is not limited to a specific camera model. If your camera is supported by gPhoto2, it will work with Sigh.
- Sigh is deliberately made simple, so you can easily customize, extend, and improve it.

## Dependencies

- PHP
- gPhoto2
- Git (optional)

## Installation and Usage

1. Install the required packages on a local machine.
2. Clone the project's repository using the `git clone https://github.com/dmpop/sigh.git` command. Alternatively, download the latest source code using the appropriate button on the project's pages.
3. Connect your camera to the machine, and turn the camera on.
3. Switch in the terminal to the _sigh_ directory and run the `php -S 0.0.0.0:8000` command.
4. Point the browser to the _127.0.0.1:8000_ address.

The [Linux Photography](https://gumroad.com/l/linux-photography) book provides detailed information  on creating Hald CLUT presets for use with Lilut. Get your copy at [Google Play Store](https://play.google.com/store/books/details/Dmitri_Popov_Linux_Photography?id=cO70CwAAQBAJ) or [Gumroad](https://gumroad.com/l/linux-photography).

<img src="https://i.imgur.com/wBgcfSk.jpg" title="Linux Photography book" width="200"/>

## Problems?

Please report bugs and issues in the [Issues](https://github.com/dmpop/sigh/issues) section.

## Contribute

If you've found a bug or have a suggestion for improvement, open an issue in the [Issues](https://github.com/dmpop/sigh/issues) section.

To add a new feature or fix issues yourself, follow the following steps.

1. Fork the project's repository
2. Create a feature branch using the `git checkout -b new-feature` command
3. Add your new feature or fix bugs and run the `git commit -am 'Add a new feature'` command to commit changes
4. Push changes using the `git push origin new-feature` command
5. Submit a pull request

## Author

Dmitri Popov [dmpop@linux.com](mailto:dmpop@linux.com)

## License

The [GNU General Public License version 3](http://www.gnu.org/licenses/gpl-3.0.en.html)
 
