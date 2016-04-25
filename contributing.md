# Contributing to Service_Status

Looking to contribute something to this repo? **Here is how u can help.**

Please take a moment to review this document in order to make the contribution process easy and effective for everyone.

Follow these guidelines helps to communicate that you respect the time of the developers managing and developing this open-source project, they szhould reciprocate that respect in adressing your issue or assesing patches and features.

## Using the issue tracker

The issue tracker is the preffered channel for bug reports, features requests and submitting pull requests, but please respect the following restrictions:

- Please **do not** use the issue tracker for personal support requests. The Slack cgannel is a better place to get help.
- Please **do not** derail or troll issues. Keep the discussion on topic and respect the opinions of others.
- Please make an invidual commit for each pull request.
- Keep descriptions short an simple.

## Issues and labels.

Our bug tracker utilizes several labels to help organize and identify issues. Here's what they represent and how we use them:

- `bug` is used for marking verified bugs.
- `duplicate` is used to marked duplicated issue reports.
- `high priority` is used to mark things that needs to be done ASAP.
- `invalid` is used for incorrect reports.
- `question` is used for reports where developers ask things to each others.
- `wontfix` is used for things that doesn't fix at the moment. But later in the development process.

For a complete look at our labels, see the project labels page.

## Bug reports

A bug is a *demonstrable problem* that caused by the code in the repository. Good bug reports are extremely helpful, so thanks.


Guidelines for bug reports:

1. **Validate and lint your code** - to ensure that the bug is in your own code or not.
2. **Use the github issue search** - check if the issue is already reported.
3. **Check if the issue has been fixed** - try to reproduce it using the lastest `master` branch in the repo.
4. **Isolate the problem** - So the develors doesn't have hard times finding the possible bug.

A good bug report shouldn't leave others needing to chase you up for more information; Please try
to be as detailed as possible in your report. What is your environment? What steps will reproduce the issue?
What browser(s) and OS experience the problem? Do other browsers show the bug differently? What would you expect to be the outcome? All these details will help people to fix any potential bugs.

Example:

> Short and descriptive example bug report title.
>
> A summary of the issue and the browser/OS environment in which it occurs. if suitable, include the steps required to reproduce the bug.
>
> 1. This is the first step.
> 2. This is the second step.
> 3. Further steps, etc.
>
> `<url>` - a link to the reduced test case
>
> Any other information you want to share that is relevant to the issue being reported. This might include the lines of code that you have identified as causing the bug, and potential solutions (and your opinions on their merits.)

## Feature requests

Feature requests are welcome. But take a moment to find out whether your idea fits with the scope and aims of
the project. It's up to *you* to make a strong case to convince the project's developers of the merits of this feature. Please provide as much detail and context as possible.

## Pull requests

Good pull requests -- patches, improvements, new features -- are a fantastic help. They should remain focused in scope and avoid containing unrelated commits.

**Please ask first** before embarking on any significant pull request (e.g implementing features,
refactoring code, porting to a different language), otherwise you risk spending a lot of time working on
something that the project's developers might not want to merge into the project.

Please adhere to the `PSR-2 and PSR-4` coding guidelines used throughout the project (indentation, accurate comments, etc.) and any other requirements (such as test coverage).

**Do not edit the `.css` files in the public directory or those files are automatically generated. You should
edit the source files in `/resources/assets/scss` instead.

Adhering to the following process is the best way to get your work included in the project:

1. Fork the project, clone your fork, and configure the remotes:

```bash
# Clone your fork of the repo into the current directory
git clone https://www.github.com/<your-username>\<repo>.git

# Navigate to the newly cloned directory
cd <repo-directory>

# Assign the original repo to a remote called "upstream"
git remote add upstream https://www.github.com/user/repo.git
```

2. If you cloned a while ago, get the latest changes from upstream:

```bash
git checkout master
git pull upstream master
```

3. Create a new topic branch (off the main project development branch) to contain your feature, change, or fix:
```bash
git checkout -b <topic-branch-name>
```

4. Commit your changes in logical chunks. Please adhere to these git commit message guidelines or your code in unlikely be merged into the main project. Use Git's interactive rebase feature to tidy up your commits before making them public.

5. Locally merge (or rebase) the upstream development branch into your topic branch:

```bash
git pull [--rebase] upstream master
```

6. Push your topic branch up to your fork:

```bash
git push origin <topic-branch-name>
```

7. Open a Pull request with a clear title and description against the `dev` branch.
