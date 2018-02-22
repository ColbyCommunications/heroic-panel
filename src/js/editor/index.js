import React from 'react';

const {
  registerBlockType,
  InnerBlocks,
  ImagePlaceholder,
  BlockControls,
  MediaUpload,
} = wp.blocks;

const { IconButton, Toolbar } = wp.components;

registerBlockType('colbycomms/heroic-panel', {
  title: 'Heroic Panel',

  category: 'layout',

  attributes: {
    backgroundImage: {
      type: 'object',
    },
  },

  edit({ attributes, setAttributes }) {
    const onSelectImage = backgroundImage => {
      setAttributes({ backgroundImage });
    };

    if (!attributes.backgroundImage) {
      return (
        <div>
          <ImagePlaceholder onSelectImage={onSelectImage} />
        </div>
      );
    }

    return [
      <BlockControls key="controls">
        <Toolbar>
          <MediaUpload
            onSelect={onSelectImage}
            type="image"
            value={attributes.id}
            render={({ open }) => (
              <IconButton
                className="components-toolbar__control"
                label="Edit Image"
                icon="edit"
                onClick={open}
              />
            )}
          />
        </Toolbar>
      </BlockControls>,
      <div className="heroic-panel">
        <div
          className="heroic-panel__inner"
          style={{
            backgroundImage: `url('${
              attributes.backgroundImage.sizes.full.url
            });`,
          }}
        >
          <div className="heroic-panel__content-container">
            <InnerBlocks />
          </div>
        </div>
      </div>,
    ];
  },

  save({ attributes }) {
    if (!attributes.backgroundImage) {
      return <div />;
    }

    return (
      <div className="heroic-panel">
        <div
          className="heroic-panel__inner"
          style={{
            backgroundImage: `url('${
              attributes.backgroundImage.sizes.full.url
            };`,
          }}
        >
          <div className="heroic-panel__content-container">
            <InnerBlocks.Content />
          </div>
        </div>
      </div>
    );
  },
});
