# slack-to-discord

Ensure compatibility between slack and discord with this proxy which
converts ton the fly the web hook.

Then this tool permit you use use your Slack webhook integration in Discord !


## Requirements

### Apache installation

To run the slack-to-discord proxy on an Apache server, ensure you have the following:

- PHP 8.0+ installed
- Composer installed
- Apache 2.4

### Docker usage

For a containerized deployment, you can use the associated Docker image [henri9813/slack-to-discord](https://hub.docker.com/r/henri9813/slack-to-discord).

```yaml
services:
  slack-to-discord:
    image: henri9813/slack-to-discord
    ports:
      - 8000:80
```

## Usage

1. **Generate a Webhook in Discord**:
    - Create a webhook in your desired Discord server.

2. **Replace the Discord URL**:
    - Change the `discord.com` part of the URL to your proxy URL (`your-slack-to-discord.com`).

3. **Configure Your Application**:
    - Update your final application settings to use the new webhook URL.

## Licence

Creative Commons Attribution-NonCommercial 4.0 International License
